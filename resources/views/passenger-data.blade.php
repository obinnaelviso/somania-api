<!doctype html>
<html lang="en">
  <head>
    <title>API Frontend</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <h1>PASSENGER NAME >> {{ $passenger_data->passenger_name }}</h1><hr><br>
        {{-- Frequent Flyers --}}
        <div class="row">
            <div class="col-md-12">
                <h2>Frequent Flyers</h2>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">frequent_flyer_serial</th>
                                <th scope="col">section_label</th>
                                <th scope="col">frequent_flyer_passenger_name</th>
                                <th scope="col">frequent_flyer_carrier_code</th>
                                <th scope="col">frequent_flyer_number</th>
                                <th scope="col">cross_accrual_indicator</th>
                                <th scope="col">cross_accrual_carrier_list</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($frequent_flyers as $frequent_flyer)
                                <tr>
                                    <td>{{ $frequent_flyer->frequent_flyer_serial }}</td>
                                    <td>{{ $frequent_flyer->section_label }}</td>
                                    <td>{{ $frequent_flyer->frequent_flyer_passenger_name }}</td>
                                    <td>{{ $frequent_flyer->frequent_flyer_carrier_code }}</td>
                                    <td>{{ $frequent_flyer->frequent_flyer_number }}</td>
                                    <td>{{ $frequent_flyer->cross_accrual_indicator }}</td>
                                    <td>{{ $frequent_flyer->cross_accrual_carrier_list }}</td>
                                </tr>
                            @endforeach
                          </tbody>
                    </table>
                </div>
            </div>
        </div>

        <br><br>

        {{-- Fare Values --}}
        <div class="row">
            <div class="col-md-12">
                <h2>Fare Values</h2>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">fare_serial</th>
                                <th scope="col">section_label</th>
                                <th scope="col">fare_section_indicator</th>
                                <th scope="col">base_fare_currency_code</th>
                                <th scope="col">base_fare_amount</th>
                                <th scope="col">total_amount_currency_code</th>
                                <th scope="col">total_amount</th>
                                <th scope="col">equivalent_amount_currency_code</th>
                                <th scope="col">equivalent_amount</th>

                                <th scope="col">net_remit_amount</th>
                                <th scope="col">taxes_currency_code</th>
                                <th scope="col">tax1_amount</th>
                                <th scope="col">tax1_code</th>
                                <th scope="col">tax2_amount</th>
                                <th scope="col">tax2_code</th>
                                <th scope="col">tax3_amount</th>
                                <th scope="col">tax3_code</th>
                                <th scope="col">tax4_amount</th>
                                <th scope="col">tax4_code</th>
                                <th scope="col">tax5_amount</th>
                                <th scope="col">tax5_code</th>

                                <th scope="col">xt_tax_details</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($fare_values as $fare_value)
                                <tr>
                                    <td>{{ $fare_value->fare_serial }}</td>
                                    <td>{{ $fare_value->section_label }}</td>
                                    <td>{{ $fare_value->fare_section_indicator }}</td>
                                    <td>{{ $fare_value->base_fare_currency_code }}</td>
                                    <td>{{ $fare_value->base_fare_amount }}</td>
                                    <td>{{ $fare_value->total_amount_currency_code }}</td>
                                    <td>{{ $fare_value->total_amount }}</td>
                                    <td>{{ $fare_value->equivalent_amount_currency_code }}</td>
                                    <td>{{ $fare_value->equivalent_amount }}</td>

                                    <td>{{ $fare_value->net_remit_amount }}</td>
                                    <td>{{ $fare_value->taxes_currency_code }}</td>
                                    <td>{{ $fare_value->tax1_amount }}</td>
                                    <td>{{ $fare_value->tax1_code }}</td>
                                    <td>{{ $fare_value->tax2_amount }}</td>
                                    <td>{{ $fare_value->tax2_code }}</td>
                                    <td>{{ $fare_value->tax3_amount }}</td>
                                    <td>{{ $fare_value->tax3_code }}</td>
                                    <td>{{ $fare_value->tax4_amount }}</td>
                                    <td>{{ $fare_value->tax4_code }}</td>
                                    <td>{{ $fare_value->tax5_amount }}</td>
                                    <td>{{ $fare_value->tax5_code }}</td>

                                    <td>{{ $fare_value->xt_tax_details }}</td>
                                </tr>
                                @endforeach
                          </tbody>
                    </table>
                </div>
            </div>
        </div>

        <br><br>

        {{-- Fare Bases --}}
        <div class="row">
            <div class="col-md-12">
                <h2>Fare Bases</h2>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">fare_basis_serial</th>
                                <th scope="col">section_label</th>
                                <th scope="col">fare_section_indicator</th>
                                <th scope="col">itinerary_index_number</th>
                                <th scope="col">fare_basis_code</th>
                                <th scope="col">segment_value</th>
                                <th scope="col">not_valid_before_date</th>
                                <th scope="col">not_valid_after_date</th>
                                <th scope="col">segment_ticket_designator</th>

                                <th scope="col">complete_fare_basis_code</th>
                                <th scope="col">endorsement</th>
                                <th scope="col">baggage_allowance</th>

                                <th scope="col">full_endorsement</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($fare_bases as $fare_basis)
                                <tr>
                                    <td>{{ $fare_basis->fare_basis_serial }}</td>
                                    <td>{{ $fare_basis->section_label }}</td>
                                    <td>{{ $fare_basis->fare_section_indicator }}</td>
                                    <td>{{ $fare_basis->itinerary_index_number }}</td>
                                    <td>{{ $fare_basis->fare_basis_code }}</td>
                                    <td>{{ $fare_basis->segment_value }}</td>
                                    <td>{{ $fare_basis->not_valid_before_date }}</td>
                                    <td>{{ $fare_basis->not_valid_after_date }}</td>
                                    <td>{{ $fare_basis->segment_ticket_designator }}</td>

                                    <td>{{ $fare_basis->complete_fare_basis_code }}</td>
                                    <td>{{ $fare_basis->endorsement }}</td>
                                    <td>{{ $fare_basis->baggage_allowance }}</td>

                                    <td>{{ $fare_basis->full_endorsement }}</td>
                                </tr>
                                @endforeach
                          </tbody>
                    </table>
                </div>
            </div>
        </div>

        <br><br>

        {{-- Fare Constructions --}}
        <div class="row">
            <div class="col-md-12">
                <h2>Fare Constructions</h2>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">fare_construction_serial</th>
                                <th scope="col">section_label</th>
                                <th scope="col">fare_section_indicator</th>
                                <th scope="col">type</th>
                                <th scope="col">fare_construction_detail</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($fare_constructions as $fare_construction)
                                <tr>
                                    <td>{{ $fare_construction->fare_construction_serial }}</td>
                                    <td>{{ $fare_construction->section_label }}</td>
                                    <td>{{ $fare_construction->fare_section_indicator }}</td>
                                    <td>{{ $fare_construction->type }}</td>
                                    <td>{{ $fare_construction->fare_construction_detail }}</td>
                                </tr>
                                @endforeach
                          </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
