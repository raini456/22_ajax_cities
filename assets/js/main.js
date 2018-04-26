(function () {
    var selectCountry = "", selectProvinces = "", selectCities = "";
    var tableTd = [];
    var selectTableTd = [];
    var iso3 = "", city1 = "", province = "", country = "", pop = "";
    var id =[];
    window.addEventListener('load', init);
    function init() {
        selectCountry = document.querySelector('[name="country"]');
        selectCountry.addEventListener('change', getProvinces);
        selectProvinces = document.querySelector('[name="province"]');
        selectProvinces.addEventListener('change', getCities);
        selectCities = document.querySelector('[name="city"]');
        selectCities.addEventListener('change', getCityInfo);        
        iso3 = document.querySelector('#iso3');
        city1 = document.querySelector('#city1');
        province = document.querySelector('#province');
        country = document.querySelector('#country');
        pop = document.querySelector('#pop');
        ajax('get', 'getCountries.php', {}, fillCountries);
        emptyTd();
    }
    function deleteOptions(selectBox) {
        var max = selectBox.options.length;
        for (var i = 1; i < max; i++) {
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
    function getCities() {
        ajax('get', 'getCities.php', {'province': this.value}, fillCities);
    }
    function getCityInfo() {
        ajax('get', 'getCityInfo.php', {'id': this.value}, showCityInfo);
    }
    function emptyTd() {
        iso3.innerHTML = "<i><style='color:gray'>Countrycode</style></i>";
        city1.innerHTML = "<i><style='color:gray'>City</style></i>";
        province.innerHTML = "<i><style='color:gray'>Province</style></i>";
        country.innerHTML = "<i><style='color:gray'>Country</style></i>";
        pop.innerHTML = "<i><style='color:gray'>Population</style></i>";
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
            emptyTd();
        }
    }
    function fillCities(json) {
        var cities = JSON.parse(json);
        deleteOptions(selectCities);
        emptyTd();
        for (var i = 0; i < cities.length; i++) {
            var opt = document.createElement('option');
            opt.text = cities[i].city;//Objekt json mit Unterelement countries, das jeweils die Wertepaare country-Wert und iso3-Wert hat
            opt.value = cities[i].id;
            selectCities.appendChild(opt);
        }
    }
    function showCityInfo(json) {
        var id0, id1, id2, id3, id4;
        city = JSON.parse(json);
        console.log(city);
        iso3.innerHTML = city.iso3;
        city1.innerHTML = city.city;
        province.innerHTML = city.province;
        country.innerHTML = city.country;
        pop.innerHTML = city.pop;
//        for (var i = 0; i <= 4; i++) {            
//            tableTd[i] = document.createElement('td');
//            tableTd[i].setAttribute('id', 'id' + i); 
//            id[i]=document.querySelector('#id'+i);
//        }
//        id[0].innerHTML = city.iso3;
//        id[1].innerHTML = city.city;
//        id[2].innerHTML = city.province;
//        id[3].innerHTML = city.country;
//        id[4].innerHTML = city.pop;
        
        console.log(city.lat);
        initMap(parseFloat(city.lat), parseFloat(city.lng));
    }


})();