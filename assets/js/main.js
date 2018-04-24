(function () {
    var selectCountry;
    var selectProvinces;
    window.addEventListener('load', init);
    function init() {
        selectCountry = document.querySelector('[name="country"]');
        selectCountry.addEventListener('change', getProvinces);
        selectProvinces = document.querySelector('[name="province"]');
        ajax('get', 'getCountries.php', {}, fillCountries);
    }
    //function fillCountries(r) {
    function fillCountries(json) {
        var countries = JSON.parse(json);
        //var countries = r.split(',');              
        for (var i = 0; i < countries.length; i++) {
            //var country=countries[i].split(';');
            var opt = document.createElement('option');
            opt.text = countries[i].country;//Objekt json mit Unterelement countries, das jeweils die Wertepaare country-Wert und iso2-Wert hat
            opt.value = countries[i].iso2;
//                opt.text=country[1];
//                opt.value=country[0];
            selectCountry.appendChild(opt);

        }
    }
    function getProvinces() {
        ajax('get', 'getProvinces.php', {'iso2': this.value}, fillProvinces);
    }
    function fillProvinces(json) {
        var provinces = JSON.parse(json);
        console.log(provinces);
        for (var i = 0; i < provinces.length; i++) {
            var opt = document.createElement('option');
            opt.text = provinces[i].province;//Objekt json mit Unterelement countries, das jeweils die Wertepaare country-Wert und iso2-Wert hat
            opt.value = provinces[i].province;
            selectProvinces.appendChild(opt);

        }


    }
//              var btns = [];
//              btns = document.querySelectorAll('button');
//              var output = document.querySelector('#output');
//              for (var i = 0; i < btns.length; i++) {
//                  //var btn[i] = document.querySelector('button'); //ermöglicht die Verwendung von CSS-Selektoren wie # und .
//
//                  btns[i].addEventListener('click', ajaxPost);
//              }              
})();