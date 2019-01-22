<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @if(!empty($comic))
    @foreach($comic as $item)
    <sitemap>
        <loc>{{url('comic')}}/{{$item->id}}.html</loc>
        <lastmod>{{ $item->updated_at }}</lastmod>
        <changefreq>daily</changefreq>
        <priority>0.8</priority>
    </sitemap>
    @endforeach
    @endif

    @if(!empty($comicchapter))
    @foreach($comicchapter as $item)
    <sitemap>
        <loc>{{url('read')}}/{{$item->id}}.html</loc>
        <lastmod>{{ $item->updated_at }}</lastmod>
        <changefreq>daily</changefreq>
        <priority>0.8</priority>
    </sitemap>
    @endforeach
    @endif
</sitemapindex>