const educationMap = {
  'bs_d': 2000,
  'ms_d': 2000,
  'hs': 140,
  'hs_drop': 30
};

angular.module('burmaApp', [])
.controller('BurmaController', ['$scope', function($scope) {
  var self = this;
  self.education = 'hs';
  self.religion = 'christianity';
  self.attractive = '1';

  self.submitted = false;
  self.currency = null;
  self.results = null;

  self.update = function() {
    let value = 0;

    if(self.religion === 'hinduism') {
      value += 2000;
    }

    if(educationMap[self.education]) {
      value += educationMap[self.education];
    }

    value += self.attractive * 400;

    let cows = 0;
    let pigs = 0;
    let chickens = 0;

    cows = Math.floor(value / 2000);
    if(cows >= 1) { value = value % 2000; }
    pigs = Math.floor(value / 100);
    if(pigs >= 1) { value = value % 100; }
    chickens = Math.floor(value);

    self.currency = {
      cow: cows,
      pig: pigs,
      chicken: chickens
    };
  };

  /**
   * Utility method to display plurals if necessary
   */
  self._economize = function(currency) {
    let num = self.currency[currency];
    if(num === 1) {
      return `${num} ${currency}`;
    } else {
      return `${num} ${currency}s`;
    }
  };
  /**
   * Computes results for template
   */
  self.getResults = function() {
    self.update();
    let results = [];
    for (let key in self.currency) {
      if(self.currency[key] > 0) {
        results.push(self._economize(key));
      }
    }

    self.results = results;
  }

  self.submit = function() {
    self.submitted = true;
    self.update();
    self.getResults();
  };
}]);
