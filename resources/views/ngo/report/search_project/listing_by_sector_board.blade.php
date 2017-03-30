@extends('ngo.layout.with_menu')
<?php
$topMenuId="report";
$leftMenuId="search_by_last_update";
?>
@section('content')
    <table border="0" width="100%" id="table1" cellpadding="0" style="border-collapse: collapse">

        <tr>
            <td height="20" width="20%" valign="top">
                @include("ngo.layout.left_pane")
            </td>
            <td>
                <div align="center">

                    <img src="/images/under.jpg" alt="">

                </div>
            </td>
        </tr>
    </table>
@endsection