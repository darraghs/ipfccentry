@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="panel panel-default">
            <div class="panel-heading">Club Entry</div>

            <div class="panel-body">
                
                <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                    <input type="hidden" name="cmd" value="_s-xclick">
                    <input type="hidden" name="hosted_button_id" value="Z97ETMWE64UHE">
                    <table>
                        <tr>
                            <td><input type="hidden" name="on0" value="Club Name (*required)">Club Name (*required)</td>
                        </tr>
                        <tr>
                            <td><input type="text" name="os0" maxlength="200" value="{{$clubname}}"></td>
                        </tr>
                    </table>
                    <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_paynow_LG.gif" border="0"
                           name="submit" alt="PayPal - The safer, easier way to pay online!">
                    <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1"
                         height="1">
                </form>

            </div>

        </div>
    </div>
@endsection


