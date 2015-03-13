{$this->headScript()->prependFile('/js/pages/passwordlist.js')|truncate:0:""}
<div class="panel panel-default">

    <div class="panel-body">

        <div class="tabbable" style="margin-bottom: 18px;">
            <ul class="nav nav-tabs custom-nav-tabs">
                <li class="active"><a href="#tab1" data-toggle="tab">Letzten 25 aktivitäten</a></li>
                <li class=""><a href="#tab2" data-toggle="tab">Top 25 Projektgruppen</a></li>
                <li class=""><a href="#tab3" data-toggle="tab">Tagesansicht</a></li>
            </ul>
            <div class="tab-content" style="padding-bottom: 9px; border-bottom: 1px solid #ddd;">
                <div class="tab-pane active" id="tab1">
                    <table class="footable" data-filter="#filter" data-page-size="5">
                        <thead>
                        <tr>
                            <th data-toggle="true">
                                Kunde
                            </th>
                            <th data-hide="phone">
                                Projekt
                            </th>
                            <th data-hide="phone,tablet">
                                Tätigkeit
                            </th>
                            <th data-hide="phone,tablet">
                                Kommentar
                            </th>
                            <th data-hide="phone" data-type="numeric">
                                Datum
                            </th>
                            <th data-hide="phone">
                                Dauer
                            </th>
                            <th data-hide="" data-sort-ignore="true">
                                &nbsp;
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane" id="tab2">
                </div>
            </div>
        </div>
    </div>
</div>
