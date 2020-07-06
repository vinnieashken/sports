
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"  xmlns:news="http://www.google.com/schemas/sitemap-news/0.9">
    @foreach ($sitemap as $value)
        <url>
            <loc>{{ url('/'.Str::slug($articles->getCategory($value->categoryid)->name,'-').'/'.$value->id.'/'.Str::slug($value->title,'-')) }}</loc>
            <news:news>
                <news:publication>
                    <news:name>The Standard Sports</news:name>
                    <news:language>en</news:language>
                </news:publication>
                <news:genres>PressRelease,UserGenerated</news:genres>
                <news:publication_date>{{ $value->publishday }}</news:publication_date>
                <news:title>{{ $value->title }}</news:title>
                <news:keywords>{{ str_replace(";",",",str_replace(":",",",$value->keywords)) }}</news:keywords>
            </news:news>
            <lastmod>{{ $value->publishday }}</lastmod>
        </url>
    @endforeach
</urlset>
