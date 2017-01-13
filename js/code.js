$(document).ready(function () {

    $("#somme-form").submit(function () {
        if ($("#id").val() !== "") {
            $.getJSON('scripts/getTabVotes.php', {id: $("#id").val()}, function (data) {
                key=data.question.publicKey;
                keyLogged= new BigInteger(key)
                pubKey = new paillier.publicKey(1024, keyLogged);
                vote=data.votes[0].vote;
                res=new BigInteger(vote);
                taille= data.votes.length;
                for (var i = 0; i < taille-1; i++) 
                {
                    vote = data.votes[i+1].vote;
                    res1=new BigInteger(vote);
                    res=pubKey.add(res, res1);
                }
                $("#zone-resultats").html(res.toString());
                
                
            });
        }
        return false;
    });
    
    $("#decode-form").submit(function () {
            key = $("#key").val();
            secKey = $("#secKey").val();
            resultatChiffre = $("#input-resultats").val();
            console.log(resultatChiffre);
            keyLogged = new BigInteger(key);
            pubKey = new paillier.publicKey(1024, keyLogged);
            keySec = new BigInteger(secKey);
            privKey = new paillier.privateKey(keySec, pubKey);
            resultatChiffre = new BigInteger(resultatChiffre);
            res = privKey.decrypt(resultatChiffre);
            $("#zone-results").html(res.toString());
            return false;
    });
});