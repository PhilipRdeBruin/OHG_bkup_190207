
function showxspelers() {
    if (document.getElementById("spelx").value != "leeg") {
        selected_spel = document.getElementById("spelx").value
        spelletjes = document.getElementById("spelletjes").innerHTML;
        spelletjes= JSON.parse(spelletjes);
        i = selected_spel * 1 - 1;
        nsplr = spelletjes[i]['aantalspelers'];
    } else {
        nsplr = 2;
    }

    for (ii = 3; ii <=4; ii++) {
        if (nsplr >= ii) {  
            document.getElementById("spelerlabel" + ii).style.display = "inline";
            document.getElementById("speler" + ii).style.display = "inline";
            document.getElementById("rol" + ii).style.display = "inline";
        } else {
            document.getElementById("spelerlabel" + ii).style.display = "none";
            document.getElementById("speler" + ii).style.display = "none";
            document.getElementById("rol" + ii).style.display = "none";
        }
    }

    if (document.getElementById("spelx").value != "leeg") {
        if (spelletjes[i]['rollen'] != null && spelletjes[i]['rollen'] != "") {
            arrol = spelletjes[i]['rollen'].split(";");

            document.getElementById("rol_hdr").style.visibility = "visible";
            for (ii = 1; ii <= nsplr; ii++) {
                rollijst = document.getElementById("rol" + ii);
                rollijst.style.display = "inline";
                n = rollijst.childNodes.length - 1;
                for (iii = n; iii > 1; iii--) { 
                    rollijst.removeChild(rollijst.childNodes[iii]);
                }
                for (iii = 0; iii < arrol.length; iii++) {
                    node = document.createElement("OPTION");
                    optnode = document.createTextNode(arrol[iii]);
                    node.appendChild(optnode);
                    document.getElementById("rol" + ii).appendChild(node);
                }
            }
        } else {
            document.getElementById("rol_hdr").style.visibility = "hidden";
            for (ii = 1; ii <= 4; ii++) {
                document.getElementById("rol" + ii).style.display = "none";
            }
        }
    } else {
        document.getElementById("rol_hdr").style.visibility = "hidden";
        for (ii = 1; ii <= 2; ii++) {
            document.getElementById("rol" + ii).style.display = "none";
        }
    }
}

function zetdatumtijd() {
    datum = document.getElementById("aanvangsdatum").value;
    tijd = document.getElementById("aanvangstijd").value;
    datumtijd = datum + " " + tijd;
    document.getElementById("aanvangstijdstip").value = datumtijd;
    // alert ("datumtijd = " + document.getElementById("aanvangstijdstip").value);
}

function showvriend() {
    if (document.getElementById("vriend_sel").value != "leeg") {
        vriend_sel = document.getElementById("vriend_sel").value;
        vriend = document.getElementById("vriendjes").innerHTML;
        vriend = JSON.parse(vriend);
        lenarr = vriend.length;
        i = 0; b = 0;
        do {
            if (vriend[i]['id'] == vriend_sel) {
                gebr_nm = vriend[i]['gebr_naam'];
                document.getElementById("vriend-gebrnm").innerHTML = gebr_nm;
                vnm = vriend[i]['voornaam'];
                tv = (vriend[i]['tussenv'] != null && vriend[i]['tussenv'] != "") ? " " + vriend[i]['tussenv'] : "";
                init = (vriend[i]['initialen'] != null && vriend[i]['initialen'] != "") ? " " + vriend[i]['initialen'] : "";
                anm = vriend[i]['achternaam'];
                naam = vnm + init + tv + " " + anm;
                document.getElementById("vrnd_naam").innerHTML = naam;
                straatnaam = (vriend[i]['straatnaam'] != null && vriend[i]['straatnaam'] != "") ? vriend[i]['straatnaam'] : "";
                huisnr = (vriend[i]['huisnr'] != null && vriend[i]['huisnr'] != "") ? vriend[i]['huisnr'] : "";
                strhn = (straatnaam != "" && huisnr != "") ? " " : "";
                adres = straatnaam + strhn + huisnr;
                document.getElementById("vrnd_adres").innerHTML = adres;
                postcode = (vriend[i]['postcode'] != null && vriend[i]['postcode'] != "") ? vriend[i]['postcode'] : "";
                woonplaats = (vriend[i]['woonplaats'] != null && vriend[i]['woonplaats'] != "") ? vriend[i]['woonplaats'] : "";
                pcwpl = (postcode != "" && woonplaats != "") ? " " : "";
                plaats = postcode + pcwpl + woonplaats;
                document.getElementById("vrnd_wpl").innerHTML = plaats;
                telefoon = (vriend[i]['telefoon'] != null && vriend[i]['telefoon'] != "") ? vriend[i]['telefoon'] : "";
                document.getElementById("vrnd_tel").innerHTML = telefoon;
                mobiel = (vriend[i]['mobiel'] != null && vriend[i]['mobiel'] != "") ? vriend[i]['mobiel'] : "";
                document.getElementById("vrnd_mob").innerHTML = mobiel;
                email = vriend[i]['email'];
                document.getElementById("vrnd_email").innerHTML = email;

                lnk = "afbeeldingen/vrienden/" + vriend[i]['gebr_naam'] + ".png"
                document.getElementById("vrnd_foto").src = lnk;
                b = 1;
            }
            i++;
        } while (b == 0 && i < lenarr);
        document.getElementById("vriend-profiel").style.display = "inline";
    } else {
        document.getElementById("vriend-profiel").style.display = "none";
    }
}