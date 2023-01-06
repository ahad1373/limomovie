<?php echo '<?xml version=&quot1.0&quot encoding=&quotUTF-8&quot?>'; ?>
<urlset xmlns=&quothttp://www.sitemaps.org/schemas/sitemap/0.9&quot>
    @foreach ($videos as $video)
        <url>
            <loc>https://project.app:8000/film/{{ $video->original_title }}</loc>
            <lastmod>{{ $video->created_at->tz('UTC')->toAtomString() }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.9</priority>
        </url>
    @endforeach
</urlset>
