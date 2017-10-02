(function(){
  class BurmaController {
    constructor(calc) {
      this.calc = calc;

      this.education = 'hs';
      this.religion = 'christianity';
      this.attractive = '1';

      this.submitted = false;
      this.currency = null;
      this.value = 0;
    }

    update() {
      this.value = this.calc.compute(this.religion, this.attractive, this.education);
      this.currency = this.calc.animalValue(this.value);
    }

    submit() {
      this.submitted = true;
      this.update();
    };
  }

  class BurmaCalculationService {
    compute(religion, attractive, education) {
      let value = 0;

      if(religion === 'hinduism') {
        value += 2000;
      }

      if(BurmaCalculationService.educationMap[education]) {
        value += BurmaCalculationService.educationMap[education];
      }

      value += attractive * 400;

      return value;
    }

    animalValue(value) {
      let cows = 0;
      let pigs = 0;
      let chickens = 0;

      cows = Math.floor(value / 2000);
      if(cows >= 1) { value = value % 2000; }
      pigs = Math.floor(value / 100);
      if(pigs >= 1) { value = value % 100; }
      chickens = Math.floor(value);

      return  {
        cow: cows,
        pig: pigs,
        chicken: chickens
      };
    }
  }

  BurmaCalculationService.educationMap = {
    'bs_d': 2000,
    'ms_d': 2000,
    'hs': 140,
    'hs_drop': 30
  };

  angular.module('burmaApp', [])
    .service('BurmaCalculationService', BurmaCalculationService)
    .controller('BurmaController', ['BurmaCalculationService', BurmaController]);
})();
