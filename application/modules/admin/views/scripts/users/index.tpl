<div class="panel panel-default">
    <div class="panel-heading">Neuer Benutzer</div>
    <div class="panel-body">
        <form action="/admin/users/create/" id="filterfrm" method="POST" class="form-inline">

            <button type="submit" class="btn btn-primary">Neuen Benutzer anlegen</button>

        </form>
    </div>
</div>

<div class="panel panel-default">

    <div class="panel-body">

        <div class="tabbable" style="margin-bottom: 18px;">
            <ul class="nav nav-tabs custom-nav-tabs">
                <li class="active"><a href="#tab1" data-toggle="tab">Nutzer Übersicht</a></li>
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
                                E-Mail
                            </th>
                            <th data-hide="phone,tablet">
                                Rolle
                            </th>
                            <th>
                                Aktiv
                            </th>
                            <th data-hide="" data-sort-ignore="true">
                                &nbsp;
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        {foreach $users as $user}
                            <tr>
                                <td>{$user->getFirstname()} {$user->getLastname()}</td>
                                <td>{$user->getEmail()}</td>
                                <td>{$user->getRole()->getName()}</td>
                                <td><div class="{if $user->getActiv() == 1}state-active{else}state-inactive{/if}">{if $user->getActiv() == 1}Aktiv{else}Inaktiv{/if}</div></td>
                                <td><a href="/admin/users/edit/id/{$user->getId()}" class="btn btn-block btn-primary">Bearbeiten</a></td>
                            </tr>
                        {/foreach}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
