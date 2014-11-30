<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Test task</title>

    <!-- Bootstrap -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Show valute information</h3>
                </div>
                <div class="panel-body">
                    <form action="">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="dataSource">Data source</label>
                                    <select name="data_source" class="form-control">
                                        <option value="array">Array</option>
                                        <option value="json">JSON</option>
                                        <option value="xml">XML</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="group">Group</label>
                                    <select name="group" class="form-control">
                                        <option value="">All</option>
                                        <option value="europe">Europe</option>
                                        <option value="world">World</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h3>Filtering</h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="group">Field to filter</label>
                                    <select name="filter_field" class="form-control">
                                        <option value="">Not selected</option>
                                        <option value="price">price</option>
                                        <option value="code">code</option>
                                        <option value="name">name</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="group">Filter type</label>
                                    <select name="filter_type" class="form-control">
                                        <option value="">Not selected</option>
                                        <option value="lessThan">Less than</option>
                                        <option value="lessThanOrEqual">Less than or equal to</option>
                                        <option value="equalTo">Equal to</option>
                                        <option value="moreThan">More than</option>
                                        <option value="moreThanOrEqual">More than or equal to</option>
                                        <option value="like">Like</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="group">Filter value</label>
                                    <input name="filter_value" type="text" class="form-control"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h3>Sorting</h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="group">Sort by</label>
                                    <select name="sort_by" class="form-control">
                                        <option value="">Not selected</option>
                                        <option value="price">Price</option>
                                        <option value="code">Code</option>
                                        <option value="name">Name</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="group">Sort order</label>
                                    <select name="sort_type" class="form-control">
                                        <option value="">No selected</option>
                                        <option value="asc">Ascending</option>
                                        <option value="desc">Descending</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <input type="submit" class="btn btn-info col-md-12 btn-lg" value="Get Data"/>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row" id="result-row" style="display: none">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Result</h3>
                </div>
                <div class="panel-body">
                    <div id="result">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Processing...</h4>
            </div>
            <div class="modal-body">
                Please wait...
            </div>
        </div>
    </div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/assets/js/bootstrap.min.js"></script>

<script type="text/javascript">
    $(function()
    {
        $('form').on('submit', function(e)
        {
            e.preventDefault();

            $('#myModal').modal('show');

            var data = $(this).serialize();

            $.getJSON('/ajax-get-filter-data', data, function(response)
            {
                $('#myModal').modal('hide');

                if (response.success == false) {
                    alert('Ошибка! '+ response.data);
                } else {
                    $('#result-row').show();
                    $('#result').html(response.data);
                }
            });
        });
    });
</script>
</body>
</html>