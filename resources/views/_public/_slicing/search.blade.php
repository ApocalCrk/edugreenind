@if($_SERVER['REQUEST_URI'] != '/')
<style>
    .bg_sc_bl {
        top: 80px;
    }
</style>
@endif

<div class="bg_sc_bl">
    <div class="search_input" id="sc_id">
        <svg class="site-nav__search-icon site-nav__search-icon--open ico_sc" width="26" viewBox="0 0 23 22">
            <g stroke="currentColor" stroke-width="1.5" fill="none">
            <circle cx="9.20757329" cy="8.99160695" r="8.50646589"></circle>
            <path d="M14.8522097,14.6362434 L20.7140392,20.4980728"></path>
            </g>
        </svg>
        <p class="position-absolute sc_head">Pencarian Post dan Tags</p>
        <input type="text" name="keyword" id="keyword" class="form-control" placeholder="Apa yang kamu cari?" spellcheck="false" autocomplete="off">
        <svg class="site-nav__search-icon site-nav__search-icon--close ico_clear" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
            <path fill="none" stroke="currentColor" stroke-width="1.5" d="M1 1L17 17M1 17L17 1"></path>
        </svg>

        <div class="box_result_sc" id="rc_sc">

        </div>
    </div>
</div>