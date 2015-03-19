{$this->headScript()->prependFile('/js/pages/passwordlist.js')|truncate:0:""}

<div class="panel panel-default">
    <div class="panel-heading">Neues Passwort</div>
    <div class="panel-body">
        <form action="/user/password/create/" id="passwordfrm" method="POST" class="form-inline">

            <button type="submit" class="btn btn-primary">Neues Passwort anlegen</button>

        </form>
    </div>
</div>

<div class="panel panel-default">

    <div class="panel-body">

        <div class="tabbable" style="margin-bottom: 18px;">
            <ul class="nav nav-tabs custom-nav-tabs">
                {foreach $groups as $group}
                    {if $group@first}
                        <li class="active"><a href="#{$group->getId()}" data-toggle="tab">{$group->getName()}</a></li>
                        {else}
                        <li class=""><a href="#{$group->getId()}" data-toggle="tab">{$group->getName()}</a></li>
                    {/if}
                {/foreach}
            </ul>
            <div class="tab-content" style="padding-bottom: 9px; border-bottom: 1px solid #ddd;">
                {foreach $groups as $group}
                <div class="tab-pane {if $group@first}active{/if}" id="{$group->getId()}">
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
                                Angelegt von
                            </th>
                            <th data-hide="" data-sort-ignore="true">

                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        {foreach $group->getRepository()->getPasswords($group->getId()) as $password}
                        <tr>
                            <td>{$password->getName()}</td>
                            <td>{$password->getDescription()}</td>
                            <td>{$password->getCreatedBy()->getFirstname()} {$password->getCreatedBy()->getLastname()}</td>
                            <td><a href="/user/password/view/id/{$password->getId()}" class="btn btn-block btn-primary">ansehen</a></td>
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
