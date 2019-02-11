<?php

    public function vriendToevoegenMail($gebruiker_id, $vriend_id) {
        $gebruiker = User::findOrFail($gebruiker_id);
        $vriend = User::findOrFail($vriend_id);

	$gebr_vriend = User_Relation::where('gebruiker', $gebruiker_id)->where('vriend', $vriend_id)->first();
	$vriend_gebr = User_Relation::where('vriend', $gebruiker_id)->where('gebruiker', $vriend_id)->first();

	if (!$gebr_vriend && !$vriend_gebr) {
        	$gebruiker->voegVriendToe($vriend);
	}
        
        return redirect()->route('vriendkiezen');
    }

?>
