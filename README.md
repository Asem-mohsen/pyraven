# pyraven.com

Marketing site for **Pyraven Software Solutions** — Laravel 12 + Blade, hand-written CSS/JS (no build step), Filament admin at `/admin` for contact inquiries and projects.

## Structure

| What | Where |
|---|---|
| Copy (all visible text, EN + AR) | `lang/en/site.php`, `lang/ar/site.php` — identical keys; keys ending `_html` hold trusted markup |
| Structure (service slugs/order, Gymivida URLs, city) | `config/site.php`; email/phone/socials come from `.env` via `config/app.php` |
| Routes | `routes/web.php` — each page is registered twice: English at the root (`/about`, name `about`) and Arabic under `/ar` (`/ar/about`, name `ar.about`). Use `lroute('about')` in views. Also `/sitemap.xml` (both languages + hreflang); `/mission`, `/vision` 301 → `/about` |
| Layout & SEO head | `resources/views/layouts/site.blade.php` (pages set `@section('title')`, `description`, optional `robots`) |
| Pages / partials | `resources/views/pages/*`, `resources/views/partials/*` (header, footer, hero art, Gymivida feature, process, CTA, page hero) |
| Design system | `public/assets/site/site.css` — tokens at the top (`--canvas #090E1B`, `--surface #121B2E`, `--surface-2 #17223A`, `--stroke #29344E`, `--iris #8177FF`, `--lilac #B6AFFF`, `--light #F7F8FC`); Space Grotesk headings, DM Sans body |
| Behaviour | `public/assets/site/site.js` — mobile menu (aria-expanded, Esc, focus), sticky header, scroll reveal, double-submit guard. Site works without JS. |
| Brand assets | `public/assets/img/brand/` — light lockup, stacked logo, mark, favicon, OG image. Source logo files in `public/assets/img/logo/`. |

## Arabic (RTL)

- `/ar/*` renders `lang="ar" dir="rtl"` with IBM Plex Sans Arabic; layout flips through CSS logical properties (`inset-inline-*`, `padding-inline-*`), arrows and background glows are mirrored in the `Arabic / RTL` block at the end of `site.css`.
- Letter-spacing is forced to 0 on Arabic text (it breaks letter joining). Latin brand/tech names stay in Latin script; email and phone are wrapped in `dir="ltr"`.
- Numerals: Western digits (01, 60, +20…) in both languages for consistency with the brand and phone/email formatting.
- Every page has `hreflang` en / ar / x-default and a language switch that keeps the visitor on the same page. Form errors, success message and 404/429 pages are translated; the notification email notes which language the visitor used.
- Adding a string: add the key to **both** lang files (a test fails on untranslated keys showing as `site.…`).

## Contact form

`POST /contact` → `StoreContactUsRequest` (trim/strip tags, length limits, `email:rfc,dns,spoof` in production, blocked test/disposable domains, max 2 links, honeypot `website`, 3-second time trap, optional Cloudflare Turnstile) → saved to `contact_us` → emailed to `PYRAVEN_EMAIL` with **Reply-To = visitor**. Rate limit: 3/min, 10/day per IP. If mail fails the inquiry is still saved and the error is logged.

## Configuration (`.env`)

```dotenv
PYRAVEN_EMAIL=info@pyraven.com            # inbox for inquiries + shown on the site
MAIL_MAILER=smtp                          # currently "log" → emails only go to storage/logs
MAIL_HOST=… MAIL_PORT=587 MAIL_USERNAME=… MAIL_PASSWORD=… MAIL_SCHEME=tls
MAIL_FROM_ADDRESS=no-reply@pyraven.com    # must be a pyraven.com address allowed by the SMTP provider (SPF/DKIM)
MAIL_FROM_NAME="Pyraven Website"
TURNSTILE_SITE_KEY= TURNSTILE_SECRET_KEY= # optional; widget appears when both are set
PYRAVEN_LINKEDIN_URL=… PYRAVEN_FACEBOOK_URL= PYRAVEN_INSTAGRAM_URL=   # empty = hidden
```

## Deploy

The web root is this directory's `public/`, so file changes are live immediately. After pulling:

```bash
composer install --no-dev --optimize-autoloader
php artisan migrate --force
php artisan optimize           # caches config, routes, views
php artisan test               # 51 feature tests: EN/AR pages, SEO/hreflang, contact form, mail, redirects
```

Static assets are cache-busted by file mtime (`?v=`), so no build step is needed. Submit `https://pyraven.com/sitemap.xml` in Google Search Console after deploy.

## Design QA checklist

Checked against `homepage_preview.png` / `index-2.html` on 20 Nov 2026:

- [x] Section order and copy match the prototype: hero → capability strip → 01 Expertise → 02 Products (Gymivida) → 03 Approach (light) → 04 CTA → footer
- [x] Tokens, type pairing, radii (8–16px), hairline strokes, 1200px container, 24px mobile gutters, 72–120px section padding
- [x] No horizontal overflow at 360 / 768 / 1024 / 1280 / 1440 px (hero art scales at 1024–1199, hidden below 1024)
- [x] One `<h1>` per page, unique titles + descriptions, canonical, OG/Twitter, Organization JSON-LD, sitemap, `lang="en"`
- [x] Keyboard: skip link, visible focus ring, menu opens/closes with Enter/Esc and returns focus; `aria-current` on active nav item
- [x] WCAG AA: body text `#A4AEC5` on `#090E1B` ≈ 9:1; white on primary button `#5F54EA` = 5.3:1 (the prototype's `#8378FF` is 3.5:1, below AA, so it was darkened)
- [x] `prefers-reduced-motion` disables reveal, orbit, float, and bar animations
- [x] Hero and Gymivida visuals are decorative CSS illustrations (`aria-hidden`), not real or fabricated dashboards

**Intentional differences from the prototype:** real Pyraven logo instead of the prototype glyph; cards link to service detail pages; the CTA goes to a real contact form instead of `mailto:`; footer expanded to product/company/contact columns.

## Open items (need a decision or approved content)

- Arabic copy was written in-house (Modern Standard Arabic) — have a native speaker review `lang/ar/site.php` before promoting it.
- Legal pages (privacy policy, terms) for the footer — need approved text.
- Founder, registration number and address on `/about` — add only after confirming with company records.
- Real Gymivida screenshots — replace the illustrative mock-up in `partials/gymivida-feature.blade.php`.
- SMTP credentials so inquiries are actually delivered (see Configuration).
