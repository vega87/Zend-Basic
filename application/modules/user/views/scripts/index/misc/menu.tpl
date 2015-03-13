<div style="float:left">
    <div class="contentBox" style="float:none;">
        <div>
            <div class="title">KAUFEN</div>
        </div>
        <div class="menu">
            <div class="menu-column {if !$activeList}activeColumn{/if}">
                <a href="/search/index/"><div>Beobachtungsliste (0)</div></a>
            </div>
            <div class="menu-column {if $activeList == "active_bids"}activeColumn{/if}">
                <a href="/search/seller/"><div>Aktive Gebote (0)</div></a>
            </div>
            <div class="menu-column {if $activeList == "over_bids"}activeColumn{/if}">
                <a href="/search/seller/"><div>Überboten (0)</div></a>
            </div>
            <div class="last-column {if $activeList == "success_bids"}activeColumn{/if}">
                <a href="/search/articlenr/"><div>Eroflgreich Ersteigert (0)</div></a>
            </div>
        </div>

        <div class="border_t"></div>
        <div class="border_b"></div>
        <div class="border_l"></div>
        <div class="border_r"></div>
        <div class="border_br"></div>
        <div class="border_bl"></div>
        <div class="border_tr"></div>
        <div class="border_tl"></div>
    </div>
    <div class="contentBox" style="margin-top:32px;float:none;">
        <div>
            <div class="title">VERKAUFEN</div>
        </div>
        <div class="menu">
            <div class="menu-column {if $activeList == "active_sells"}activeColumn{/if}">
                <a href="/search/member/"><div>Aktive Angebote (0)</div></a>
            </div>
            <div class="menu-column {if $activeList == "success_sells"}activeColumn{/if}">
                <a href="/search/member/"><div>Eroflgreich Verkauft (0)</div></a>
            </div>
            <div class="last-column {if $activeList == "ended_sells"}activeColumn{/if}">
                <a href="/search/member/"><div>Beendete Angebote (0)</div></a>
            </div>
        </div>

        <div class="border_t"></div>
        <div class="border_b"></div>
        <div class="border_l"></div>
        <div class="border_r"></div>
        <div class="border_br"></div>
        <div class="border_bl"></div>
        <div class="border_tr"></div>
        <div class="border_tl"></div>
    </div>
</div>