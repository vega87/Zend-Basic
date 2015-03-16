{$this->headScript()->prependFile('/js/pages/rolelist.js')|truncate:0:""}

<div class="panel panel-default">
    <div class="panel-heading">Neue Rolle</div>
    <div class="panel-body">
        <form action="/admin/role/create/" id="filterfrm" method="POST" class="form-inline">

            <button type="submit" class="btn btn-primary">Neue Rolle anlegen</button>

        </form>
    </div>
</div>

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
                                Name
                            </th>
                            <th data-hide="phone">
                                Beschreibung
                            </th>
                            <th data-hide="phone,tablet">
                                Gruppe
                            </th>
                            <th data-hide="phone,tablet">
                                Datum
                            </th>
                            <th data-hide="" data-sort-ignore="true">
                                &nbsp;
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                            {foreach $roles as $role}
                            <tr>
                                <td>{$role->getName()}</td>
                                <td>{$role->getDescription()}</td>
                                <td>
                                    {if $role->getGroup()->isEmpty() != true}
                                        {foreach $role->getGroup() as $group}
                                            {if $group == $role->getGroup()->last()}
                                                {$group->getName()}
                                                {else}
                                                {$group->getName()},
                                            {/if}
                                        {/foreach}
                                    {/if}
                                </td>
                                <td>{$role->getCreatedAt()|date_format:"%d.%m.%Y"}</td>
                                <td><a href="/admin/role/edit/id/{$role->getId()}" class="btn btn-block btn-primary">Bearbeiten</a></td>
                            </tr>
                            {/foreach}
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane" id="tab2">
                </div>
            </div>
        </div>
    </div>
</div>
