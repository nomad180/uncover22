<?xml version="1.0" encoding="UTF-8"?>
<urlset
      xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
      xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
      xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
            http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
<url>
  <loc>https://uncoveryourfit.com/</loc>
  <lastmod>2023-01-15T12:49:25+00:00</lastmod>
  <priority>1.00</priority>
</url>
<url>
  <loc>https://uncoveryourfit.com/blog</loc>
  <lastmod>2023-01-15T12:49:25+00:00</lastmod>
  <priority>0.80</priority>
</url>
<url>
  <loc>https://uncoveryourfit.com/about</loc>
  <lastmod>2023-01-15T12:49:25+00:00</lastmod>
  <priority>0.80</priority>
</url>
<url>
  <loc>https://uncoveryourfit.com/coaching</loc>
  <lastmod>2023-01-15T12:49:25+00:00</lastmod>
  <priority>0.80</priority>
</url>
<url>
  <loc>https://uncoveryourfit.com/contact</loc>
  <lastmod>2023-01-15T12:49:25+00:00</lastmod>
  <priority>0.80</priority>
</url>
<url>
  <loc>https://uncoveryourfit.com/login</loc>
  <lastmod>2023-01-15T12:49:25+00:00</lastmod>
  <priority>0.80</priority>
</url>
<url>
  <loc>https://uncoveryourfit.com/blog?category=fitness&amp;</loc>
  <lastmod>2023-01-15T12:49:25+00:00</lastmod>
  <priority>0.80</priority>
</url>
<url>
  <loc>https://uncoveryourfit.com/blog?category=nutrition&amp;</loc>
  <lastmod>2023-01-15T12:49:25+00:00</lastmod>
  <priority>0.80</priority>
</url>
<url>
  <loc>https://uncoveryourfit.com/blog?category=health&amp;</loc>
  <lastmod>2023-01-15T12:49:25+00:00</lastmod>
  <priority>0.64</priority>
</url>
<url>
  <loc>https://uncoveryourfit.com/blog?category=Weight%20Loss&amp;</loc>
  <lastmod>2023-01-15T12:49:25+00:00</lastmod>
  <priority>0.64</priority>
</url>
<url>
  <loc>https://uncoveryourfit.com/blog?category=meals&amp;</loc>
  <lastmod>2023-01-15T12:49:25+00:00</lastmod>
  <priority>0.64</priority>
</url>
<url>
  <loc>https://uncoveryourfit.com/blog?author=dleach</loc>
  <lastmod>2023-01-15T12:49:25+00:00</lastmod>
  <priority>0.80</priority>
</url>
<url>
  <loc>https://uncoveryourfit.com/privacy</loc>
  <lastmod>2023-01-15T12:49:25+00:00</lastmod>
  <priority>0.80</priority>
</url>
<url>
  <loc>https://uncoveryourfit.com/terms</loc>
  <lastmod>2023-01-15T12:49:25+00:00</lastmod>
  <priority>0.80</priority>
</url>
<url>
  <loc>https://uncoveryourfit.com/damon</loc>
  <lastmod>2023-01-15T12:49:25+00:00</lastmod>
  <priority>0.64</priority>
</url>
<url>
  <loc>https://uncoveryourfit.com/forgot-password</loc>
  <lastmod>2023-01-15T12:49:25+00:00</lastmod>
  <priority>0.64</priority>
</url>
@foreach ($posts as $post)
    <url>
        <loc>{{ url('/') }}/posts/{{ $post->slug }}</loc>
        <lastmod>{{ $post->published_at->tz('UTC')->toAtomString() }}</lastmod>
        <priority>0.8</priority>
    </url>
@endforeach
</urlset>
