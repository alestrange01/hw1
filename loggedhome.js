function playerInfo(){
    fetch("get_player.php").then(response => response.json()).then(onPlayerJson);
}

playerInfo();
