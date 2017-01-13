;(function(){



function userService($http, API) {
  var self = this;

  
	self.send = function(contract) {
		return $http.post(API + '/dipl/send', {
    		contract : contract
    	})
	}

	self.check = function(contract, block) {
		return $http.get(API + '/dipl/check', {
    		contract : contract,
				block : block
    	})
	};
	
	

  // add authentication methods here

}



function MainCtrl(user, $scope) {
	var keys = paillier.generateKeys(1024);
	$scope.pub=keys.pub.n.toString();
	$scope.priv=keys.sec.lambda.toString();
	$scope.essai="Essai";

	//a supprimer
	//$scope.pub=keysScope.n.toString();


	$scope.encode = function() {
                var key = this.key;
                var clair= this.vote;
		var keyLogged= new BigInteger(key);

// Je ne comprends pas comment fonctionne la transformation int --> BigInteger

	//  erreur ! ce n'est pas une public key....
		var pubKey = new paillier.publicKey(1024, keyLogged);
		
		//$scope.chiffre = keysScope.n.toString();
		
		
		$scope.chiffre = pubKey.encrypt(nbv(clair));

		
		// publicKey(200, self.key).bits;
		// publicKey(self.key, 200).encrypt(nbv(self.vote))
	}

	$scope.decode = function() {
                var key = this.key;
                var secKey = this.secKey;
                var resultatChiffre= this.resultatChiffre;
                keyLogged=new BigInteger(key);
                pubKey = new paillier.publicKey(1024, keyLogged);
                keySec=new BigInteger(secKey);
		var privKey = new paillier.privateKey(keySec, pubKey);
		//keySec.toString()
	//var SecKeyScope = paillier.privateKey(keys.sec.lambda, keys.pub);
                var resultatChiffre= new BigInteger(resultatChiffre);

		$scope.resultat = privKey.decrypt(resultatChiffre);           
		// publicKey(200, self.key).bits;
		// publicKey(self.key, 200).encrypt(nbv(self.vote))
	}
        $scope.sommeVotes = function() {
                var key = this.key;
                var secKey = this.secKey;
                var resultatChiffre= this.resultatChiffre;
                keyLogged=new BigInteger(key);
                pubKey = new paillier.publicKey(1024, keyLogged);
                keySec=new BigInteger(secKey);
		var privKey = new paillier.privateKey(keySec, pubKey);
		//keySec.toString()
	//var SecKeyScope = paillier.privateKey(keys.sec.lambda, keys.pub);
                var resultatChiffre= new BigInteger(resultatChiffre);

		$scope.sommeChiffre = privKey.decrypt(resultatChiffre);           
		// publicKey(200, self.key).bits;
		// publicKey(self.key, 200).encrypt(nbv(self.vote))
	}
}

angular.module('app', [])
.service('user', userService)
.constant('API', 'http://test-routes.herokuapp.com')
.controller('Main', MainCtrl)
})();