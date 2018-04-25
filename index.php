<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>PHP 22_AJAX_Cities</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="assets/css/styles.css">    
        <script src="assets/js/jquery-3.3.1.min.js" type="text/javascript"></script>
        <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="assets/js/ajax.js" type="text/javascript"></script>

    </head>
    <body>
        <div class="container">
            <div class="row">                
                <div class="col-12 col-lg-10 col-md-10 col-sm-10 col-xl-10 pt-5 pb-5">
                    <h2>City Data</h2>
                    <hr>                    
                </div>

                <div class="col-12 col-lg-10 col-md-10 col-sm-10 col-xl-10">
                    <label>
                        <select name="country" class="form-control">
                            <option>Please select country</option>
                        </select>                   
                    </label>
                </div>
                <div class="col-12 col-lg-10 col-md-10 col-sm-10 col-xl-10">    
                    <label>
                        <select name="province" class="form-control">
                            <option>Please select province</option>
                        </select>
                    </label>
                </div>
                <div class="col-12 col-lg-10 col-md-10 col-sm-10 col-xl-10">
                    <label>
                        <select name="city" class="form-control">
                            <option>Please select city</option>
                        </select>
                    </label>
                </div>
                <hr class="mt-5">
                <div class="col-12 col-lg-10 col-md-10 col-sm-10 col-xl-10">
                    <label><h3>City-Informationen</h3>
                        <table class="table table-bordered">
                            <thead></thead>
                            <tbody>
                                <tr>
                                    <th>City-ASCII</th>
                                    <th>Latitude</th>
                                    <th>Longitude</th>
                                    <th>Population</th>
                                    <th>Province</th>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>


                            </tbody>

                        </table>
                    </label>
                </div>

                <hr>
            </div>                
        </div>
    </div>
    <script src="assets/js/main.js" type="text/javascript"></script>    
</body>
</html>
