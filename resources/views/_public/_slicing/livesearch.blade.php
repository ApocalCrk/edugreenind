<!-- Post -->
<a style="font-weight: bold;">Post Teratas&nbsp;&nbsp;<small style="font-weight: normal;">Lihat Semua</small></a><br>
@foreach($post as $row)
    <a href="/post/{{$row->judul_seo}}" style="color: inherit" class="link_sc">{{$row->judul}}</a><br>
@endforeach

<a href="/search?q={{$pencarian}}" style="color: #999999;" class="link_sc">Cari Post Terbaru: Untuk <b>{{$pencarian}}</b></a>

<!-- Tag -->
<br><br><a style="font-weight: bold;">Tags Teratas&nbsp;&nbsp;<small style="font-weight: normal;">Lihat Semua</small></a><br>
@foreach($tag as $row)
    <a href="/tag/{{$row->nama_tag}}" style="color: inherit" class="link_sc">#{{$row->nama_tag}}</a><br>
@endforeach

<br>
<a href="/search?q={{$pencarian}}" class="see_more_rs">
    Lihat Hasil Lainnya &nbsp;
    <svg viewBox="0 0 22 18" width="22" height="18" xmlns="http://www.w3.org/2000/svg" class="arrow-left es-search__submit__arrow"><g fill="none" stroke="currentColor" stroke-width="1.5"><path d="M9.058 1.219L1.203 9.074l7.855 7.855M1.5 9.074h20.005"></path></g></svg>
</a>
    