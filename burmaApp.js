(function(){
  const educationMap = {
    'bs_d': 2000,
    'ms_d': 2000,
    'hs': 140,
    'hs_drop': 30
  };

  class BurmaController {
    constructor() {
      this.education = 'hs';
      this.religion = 'christianity';
      this.attractive = '1';

      this.submitted = false;
      this.currency = null;
      this.results = null;
    }

    update() {
      let value = 0;

      if(this.religion === 'hinduism') {
        value += 2000;
      }

      if(educationMap[this.education]) {
        value += educationMap[this.education];
      }

      value += this.attractive * 400;

      let cows = 0;
      let pigs = 0;
      let chickens = 0;

      cows = Math.floor(value / 2000);
      if(cows >= 1) { value = value % 2000; }
      pigs = Math.floor(value / 100);
      if(pigs >= 1) { value = value % 100; }
      chickens = Math.floor(value);

      this.currency = {
        cow: cows,
        pig: pigs,
        chicken: chickens
      };
    };

    /**
    * Utility method to display plurals if necessary
    */
    _economize(currency) {
      let num = this.currency[currency];
      if(num === 1) {
        return `${num} ${currency}`;
      } else {
        return `${num} ${currency}s`;
      }
    };

    /**
    * Computes results for template
    */
    getResults() {
      let results = [];
      for (let key in this.currency) {
        if(this.currency[key] > 0) {
          results.push(this._economize(key));
        }
      }

      this.results = results;
    }

    submit() {
      this.submitted = true;
      this.update();
      this.getResults();
    };
  }

  angular.module('burmaApp', [])
    .controller('BurmaController', [BurmaController]);
})();
