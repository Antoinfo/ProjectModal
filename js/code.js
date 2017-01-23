$(document).ready(function () {
    $("#somme-form").submit(function () {
        if ($("#id").val() !== "") {
            $.getJSON('scripts/getTabVotes.php', {id: $("#id").val()}, function (data) {
                key=data.question.publicKey;
                document.getElementById('PublicKey2').value=key;
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
                document.getElementById('input-resultats').value=res.toString();
                
                
            });
        }
        return false;
    });
    
    $("#decode-form").submit(function () {
            key = $("#PublicKey2").val();
            secKey = $("#secKey").val();
            resultatChiffre = $("#input-resultats").val();
            keyLogged = new BigInteger(key);
            pubKey = new paillier.publicKey(1024, keyLogged);
            keySec = new BigInteger(secKey);
            privKey = new paillier.privateKey(keySec, pubKey);
            resultatChiffre = new BigInteger(resultatChiffre);
            res = privKey.decrypt(resultatChiffre);
            $("#zone-results").html(res.toString());
            return false;
    });
    var keys = paillier.generateKeys(1024);
    $("#pub").html(keys.pub.n.toString());
    if(document.getElementById('PublicKey')!==null){
        document.getElementById('PublicKey').value=keys.pub.n.toString();
    }
    $("#sec").html(keys.sec.lambda.toString());
    
    $("#encode-form").submit(function () {
        if ($("#id").val() !== null) {
            $.getJSON('scripts/getPubKey.php', {id: $("#id").val()}, function (data) {
            clair = $("#choix").val();
            key = data.question.publicKey;
            keyLogged = new BigInteger(key);
            pubKey = new paillier.publicKey(1024, keyLogged);
            chiffre=pubKey.encrypt(nbv(clair));
            document.getElementById('vote').value=chiffre.toString();
            document.getElementById('id_Questions').value=$("#id").val();
     });
        }
        return false;
            
            
    });
    
    $("#create-question").submit(function () {
            alert("veuillez conserver cette clé privée bien précieusement :  "+keys.sec.lambda.toString());
    });
    
 

    
});