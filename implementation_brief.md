# Pyraven Software Solutions — Website Redesign Implementation Brief

## Role
You are a senior brand designer, art director, UX designer, and frontend engineer. Redesign pyraven.com into an elegant, premium, credible B2B software engineering studio website. Use `index.html` in this package as a visual prototype, not as the final source of truth for functionality.

## Brand strategy
Position Pyraven as a software engineering and digital product company that builds custom platforms for clients and develops its own software products. Tone: intelligent, direct, assured, and clear. Avoid generic startup hype, unverified customer logos, unsupported stats or claims, stock photos of developers, excessive neon gradients, glass overload, and decorative code imagery without purpose.

## Design system
- Brand name: Pyraven Software Solutions
- Visual theme: Obsidian & Electric — technical architectural minimalism
- Canvas / dark background: `#090E1B`
- Dark cards: `#121B2E`; elevated cards: `#17223A`
- Stroke: `#29344E`
- Primary electric iris: `#8177FF`
- Secondary lilac: `#B6AFFF`
- Light sections: `#F7F8FC`
- Main text: `#F7F8FE`; muted text: `#A4AEC5`
- Typography: Space Grotesk for headings, DM Sans for body; for Arabic use IBM Plex Sans Arabic or Alexandria with careful RTL styling.
- 12-column desktop grid, max-width 1180–1240px, 24px mobile side gutters, generous 96–120px section padding.
- 8–16px radius depending on component. Hairline borders, sparse gradients, disciplined negative space.
- Design navigation, buttons, headings, cards, forms, product previews, and footer as reusable components.

## Homepage sitemap and content
1. Navbar — Pyraven logo, Expertise, Products, Approach, About, Contact; primary `Let's talk` CTA.
2. Hero — Eyebrow `INDEPENDENT SOFTWARE ENGINEERING STUDIO`; headline `Software, engineered with purpose.`; description `We design, build, and scale digital products that solve complex problems and move businesses forward.`; CTAs `Start a project` and `Explore our work`. On desktop, show a sophisticated custom software-interface composition, not a real or fabricated client dashboard.
3. Capability strip — Web platforms, Mobile apps, SaaS products, Automation & APIs.
4. Expertise — Three focus cards: Custom Software, Mobile Experiences, SaaS & Integrations. Link these to detail pages; discuss UX design, cloud engineering and maintenance within the appropriate details.
5. Featured product — Gymivida; distinguish the gym-management SaaS and fitness-discovery marketplace. Link to `https://gymivida.com/en` and consider adding actual approved screenshots.
6. Working process — Discover, Design, Build, Evolve. Explain methodology without fabricating timelines or certifications.
7. About / credibility — Based in Cairo, Egypt; legally registered company; add founder and verifiable company details after explicit approval. Case studies must be substantiated.
8. CTA / Contact — prominent `Let's build together` message, email `info@pyraven.com`, and accessible, validated inquiry form that really sends emails through a backend.
9. Footer — product links, legal documents, contact and copyright.

## Implementation
- Preferred architecture: Next.js + TypeScript + Tailwind CSS + reusable UI components if migrating the site; otherwise port the same design to the current framework without an unnecessary rewrite.
- Mobile-first responsive support at 360px, 768px, 1024px, 1440px.
- Semantic HTML5, WCAG AA contrast, keyboard-accessible menu, visible focus indicators, meaningful alt text, reduced-motion support.
- Optimize web fonts, image sizes, loading, and SEO metadata. Serve images in WebP/AVIF when appropriate. No autoplay video.
- Use subtle animations: staggered entrance, deliberate hover transitions, lightweight background motion; disable animation when `prefers-reduced-motion` is set.
- Use final approved Pyraven logo rather than treating the prototype's geometric glyph as a registered mark.
- Arabic version should be fully localized and RTL rather than a mirrored English screen; test correct numeral and icon treatment.
- Page routes: `/`, `/services`, `/services/custom-software`, `/services/mobile-apps`, `/services/saas-integrations`, `/products`, `/products/gymivida`, `/about`, `/contact`.
- Preserve existing meaningful copy, canonical URLs, and redirects where needed.

## Deliverables
A refined brand kit (logo variants, icons, typography, palette, spacing, components); desktop/tablet/mobile page designs; working responsive frontend; accessible navigation and contact form; optimized image assets; and instructions for deployment. Provide a design QA checklist and compare the output against the supplied prototype.

## Verification checklist
Check product descriptions and integrations against actual Gymivida functionality. Do not fabricate partner logos, client count, review scores, revenue, security certifications, industry awards, number of years, or launch claims. Confirm exact legal name, address, contact information, and leadership spelling with company records before displaying them.
