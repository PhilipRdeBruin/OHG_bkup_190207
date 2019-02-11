@extends('layouts.standaard')
@section('content')

 <!--HIDDEN FORM-->
 <form id="hiddenform" method="POST" action="">
        <input id="input_act_spel" type="text" name="act_spel"></input>
        <input id="input_speler" type="text" name="speler"></input>
    </form>

    <div id="games">
        <h1 id="players">Games:</h1>
        <div onclick="selectGame(this)" id="bke" class="game">Boter, Kaas en Eieren</div>
        <div onclick="selectGame(this)" id="voer" class="game">Vier op een rij</div>
        <div onclick="selectGame(this)" class="game"></div>
        <div onclick="selectGame(this)" class="game"></div>
        <div onclick="selectGame(this)" class="game"></div>
        <div onclick="selectGame(this)" class="game"></div>
    </div>
    <div id="chat">
            <div id="chattext" onscroll="scrollDown(this)">
                
            </div>
            <div id="scrolldown" onclick="scrollNow()">&#9660; scroll down &#9660;</div>
            <input id="chatinput"></input>
        </div>

        <div id="modalbg">
            <div id="modal">
                <h3 id="modalhead"></h3>
                <p id="modaltext"></p>
                <div id="status"></div>
                <div style="clear: both"></div>
                <div id="invitebuttons">
                    <button onclick="declineInv()">Decline invite</button>
                    <button onclick="acceptInv()">Accept invite</button>
                </div>
                <div id="confirmbuttons">
                    <button onclick="goToGame()">Go to game</button>
                </div>
                <div id="closebuttons">
                    <button onclick="closeQ()">Close queue</button>
                </div>
            </div>
        </div>
    

    <script src="http://localhost:3000/socket.io/socket.io.js"></script>
    <script>

//room
const friends = [
   {!! json_encode($vriend->gebr_naam) !!},
   {!! json_encode($gebruiker->gebr_naam) !!}
];
user = friends[0];
var room = [
   {!! json_encode($vriend->gebr_naam) !!},
   {!! json_encode($gebruiker->gebr_naam) !!}
];
var game;
var acceptQueue = {};
room.sort(function(a, b){
    var nameA=a.toLowerCase(), nameB=b.toLowerCase();
    if (nameA < nameB) //sort string ascending
        return -1; 
    if (nameA > nameB)
        return 1;
    return 0; //default return value (no sorting)
});
var bolder = "";
for(i=0;i<room.length;i++){
    bolder += room[i] 
}
room = bolder;
var queuesocket = io('http://localhost:3000/queue');
var gameData = {room: room, user: user};
queuesocket.emit('join room', gameData);


var invitedBy;

queuesocket.on('invited', function(data) {
    game = data[1];
    data = data[0];
    console.log("data:")
    console.log(data);
    document.getElementById("modalbg").style.display = "block"
    invitedBy = data;
    acceptQueue = {};
    for (i = 0; i < data.length; i++) {
        acceptQueue[data[i]] = "";
    }
    
    acceptQueue[Object.keys(acceptQueue)[0]] = "accepted";
    console.log(acceptQueue);
    renderStatus();
    document.getElementById("modalhead").innerHTML = `Invite:`
    document.getElementById("modaltext").innerHTML = `${game} selected by ${data[0]}, waiting for players:`
    document.getElementById("input_act_spel").value = 124;
    document.getElementById("input_speler").value = user;
    document.getElementById("hiddenform").action = `http://sockets.styx.gg/${game}.php`;
});

queuesocket.on('confirm', function(data) {
    acceptQueue[data] = "accepted";
    renderStatus();
});

queuesocket.on('decline', function(data) {
    acceptQueue[data] = "declined";
    renderStatus();
    document.getElementById("confirmbuttons").style.display = "none";
});

function selectGame(data) {
        game = data.id;
        var select = {data: data.id, friends: friends}
        queuesocket.emit('select game', select)
};

function declineInv() {
    queuesocket.emit('response', [0, invitedBy]);
    document.getElementById("modalbg").style.display = "none";
    document.getElementById("invitebuttons").style.display = "none";
    document.getElementById("closebuttons").style.display = "none"
};

function goToGame() {
    queuesocket.emit('to game', true);
    document.getElementById("modalbg").style.display = "none";
    document.getElementById("confirmbuttons").style.display = "none";
    document.getElementById("closebuttons").style.display = "none"
    document.getElementById('hiddenform').submit();
};

function acceptInv() {
    queuesocket.emit('response', [1, invitedBy]);
    document.getElementById("invitebuttons").style.display = "none";
    document.getElementById("closebuttons").style.display = "none"
};

function renderStatus() {
    let holder = "";
    for (i = 0; i < Object.keys(acceptQueue).length; i++) {
        holder += `<div id="_${Object.keys(acceptQueue)[i]}" class="queuestatus ${acceptQueue[Object.keys(acceptQueue)[i]]}"></div>`
        if (acceptQueue[Object.keys(acceptQueue)[i]] == "declined" && document.getElementById("modalbg").style.display == "block") {
            document.getElementById("closebuttons").style.display = "block"
        }
    }
    console.log("holder:")
    console.log(holder)
    document.getElementById("status").innerHTML = holder;
    if (acceptQueue[user] == "" && acceptQueue[user] != null) {
        document.getElementById("closebuttons").style.display = "none"
        document.getElementById("invitebuttons").style.display = "block"
    }
    var accepted = document.getElementsByClassName("accepted");
    if (accepted.length == friends.length) {
        document.getElementById("closebuttons").style.display = "none"
        document.getElementById("confirmbuttons").style.display = "block"
    }
};

function closeQ() {
    queuesocket.emit('response', [0, invitedBy]);
    document.getElementById("modalbg").style.display = "none";
    document.getElementById("closebuttons").style.display = "none";
}

//chat

var chatsocket = io('http://localhost:3000/chat');
var chatData = {room: room, user: user};


function scrollDown(x){
    if(x.scrollHeight-x.scrollTop> x.clientHeight*2){
        document.getElementById("scrolldown").style.display = "block"
    } else {
        document.getElementById("scrolldown").style.display = "none"
    }
}

function scrollNow(){
    var chatText = document.getElementById("chattext")
    chatText.scrollTop = chatText.scrollHeight;
}



chatsocket.emit('join room', chatData);
chatsocket.on('chat history', function(msg){
    var chatText = document.getElementById("chattext")
    for(i=0;i<msg.length;i++){ 
        chatText.innerHTML+= `${msg[i]} <br>`;
        chatText.scrollTop = chatText.scrollHeight;
    }
    document.getElementById("chattext").style.scrollBehavior= "smooth";
})

var chatinput = document.getElementById('chatinput');
chatinput.addEventListener('keydown', (e) => {
    if (e.key === 'Enter' && chatinput.value != "") {
        chatsocket.emit('msg', chatinput.value);
        chatinput.value = "";
    }
});

chatsocket.on('msg', function(msg){
    var chatText = document.getElementById("chattext")
    chatText.innerHTML+= `${msg} <br>`;
    chatText.scrollTop = chatText.scrollHeight;
})

    </script>
       


@endsection