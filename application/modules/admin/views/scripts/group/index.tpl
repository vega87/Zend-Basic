{$this->headScript()->prependFile('/js/pages/grouplist.js')|truncate:0:""}

<div class="panel panel-default">
    <div class="panel-heading">Neue Gruppe</div>
    <div class="panel-body">
        <form action="/admin/group/create" id="filterfrm" method="POST" class="form-inline">

            <button type="submit" class="btn btn-primary">Neue Gruppe anlegen</button>

        </form>
    </div>
</div>

<div class="panel panel-default">

    <div class="panel-body">

        <div class="tabbable" style="margin-bottom: 18px;">
            <ul class="nav nav-tabs custom-nav-tabs">
                <li class="active"><a href="#all" data-toggle="tab">Alle</a></li>
                {foreach $roles as $role}
                    <li class=""><a href="#{$role->getMetaKey()}" data-toggle="tab">{$role->getName()}</a></li>
                {/foreach}
            </ul>
            <div class="tab-content" style="padding-bottom: 9px; border-bottom: 1px solid #ddd;">
                <div class="tab-pane active" id="all">
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
                                Datum
                            </th>
                            <th data-hide="" data-sort-ignore="true">
                                &nbsp;
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        {foreach $groups as $group}
                            <tr>
                                <td>{$group->getName()}</td>
                                <td>{$group->getDescription()}</td>
                                <td>{$group->getCreatedAt()|date_format:"%d.%m.%Y"}</td>
                                <td><a href="/admin/group/edit/id/{$group->getId()}" class="btn btn-block btn-primary">Bearbeiten</a></td>
                            </tr>
                        {/foreach}
                        </tbody>
                    </table>
                </div>
                {foreach $roles as $role}
                    <div class="tab-pane" id="{$role->getMetaKey()}">
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
                                    Datum
                                </th>
                                <th data-hide="" data-sort-ignore="true">
                                    &nbsp;
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            {foreach $role->getGroup() as $group}
                                <tr>
                                    <td>{$group->getName()}</td>
                                    <td>{$group->getDescription()}</td>
                                    <td>{$group->getCreatedAt()|date_format:"%d.%m.%Y"}</td>
                                    <td><a href="/admin/group/edit/id/{$group->getId()}" class="btn btn-block btn-primary">Bearbeiten</a></td>
                                </tr>
                            {/foreach}
                            </tbody>
                        </table>
                    </div>
                {/foreach}
            </div>
        </div>
    </div>
</div>
