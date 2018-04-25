(function () {
    var selectCountry;
    var selectProvinces;
    var selectCities;
    window.addEventListener('load', init);
    function init() {
        selectCountry = document.querySelector('[name="country"]');
        selectCountry.addEventListener('change', getProvinces);        
        selectProvinces = document.querySelector('[name="province"]');        
        selectProvinces.addEventListener('change', getCities);
        selectCities = document.querySelector('[name="city"]');
        selectCities.addEventListener('change', getInfoCity);
        ajax('get', 'getCountries.php', {}, fillCountries);
    }
    function deleteOptions(selectBox){
        var max=selectBox.options.length;
        for(var i=1; i<max;i++){
            selectBox.removeChild(selectBox.options[1]);
        }
    }
    //function fillCountries(r) {
    function fillCountries(json) {
        var countries = JSON.parse(json);
        //var countries = r.split(',');              
        for (var i = 0; i < countries.length; i++) {
            //var country=countries[i].split(';');
            var opt = document.createElement('option');
            opt.text = countries[i].country;//Objekt json mit Unterelement countries, das jeweils die Wertepaare country-Wert und iso3-Wert hat
            opt.value = countries[i].iso3;
            selectCountry.appendChild(opt);

        }
    }
    function getProvinces() {
        ajax('get', 'getProvinces.php', {'iso3': this.value}, fillProvinces);
    }
    function getCities(){
        ajax('get', 'getCities.php', {'province': this.value}, fillCities);
    }
    function getInfoCity(){
        ajax('get', 'getInfo.php', {'city': this.value}, fillInfoCity);
    }
    function fillProvinces(json) {
        var provinces = JSON.parse(json);
        deleteOptions(selectProvinces); 
        deleteOptions(selectCities);        
        for (var i = 0; i < provinces.length; i++) {
            var opt = document.createElement('option');
            opt.text = provinces[i].province;//Objekt json mit Unterelement countries, das jeweils die Wertepaare country-Wert und iso3-Wert hat
            opt.value = provinces[i].province;
            selectProvinces.appendChild(opt);
        }
    }
    function fillCities(json) {
        var cities = JSON.parse(json);         
        deleteOptions(selectCities);        
        for (var i = 0; i < cities.length; i++) {
            var opt = document.createElement('option');
            opt.text = cities[i].city;//Objekt json mit Unterelement countries, das jeweils die Wertepaare country-Wert und iso3-Wert hat
            opt.value = cities[i].city;
            selectCities.appendChild(opt);
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