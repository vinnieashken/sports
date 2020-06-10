

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"  xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">
    @foreach ($sitemap as $value)
        <url>
            <loc>{{ url('/'.Str::slug('-',App\Models\Category::where('id',$value->categoryid)->first()->name).'article/'.$value->id.'/'.Str::slug('-',$value->title)) }}</loc>
            <image:image>
                <image:loc>{{ env('IMAGECDN').$value->thumbURL }}</image:loc>
                <image:caption>{{ $value->thumbcaption }}</image:caption>
                <image:title>{{ $value->title }}</image:title>
                <image:geo_location>Nairobi,Kenya</image:geo_location>
            </image:image>
            <lastmod>{{ $value->publishday }}</lastmod>
        </url>;
    @endforeach
</urlset>
