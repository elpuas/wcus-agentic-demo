# Testimonial Block Demo

## Goal

- Build one standalone plugin in `testimonial-carousel/` from the supplied Figma frame.
- This repository is intentionally empty before the demo. Skip project triage.
- Use only the included `wp-block-development`, `wp-interactivity-api`, and `wp-playground` Skills.

## Implementation Contract

- Begin with the official scaffold:

  ```bash
  npx @wordpress/create-block@4.96.0 testimonial-carousel --template @wordpress/create-block-interactive-template@2.53.0
  ```

- Keep the block dynamic and render it with `render.php`.
- Use `block.json`, `@wordpress/scripts`, translatable strings, and WordPress coding standards.
- Use the WordPress Interactivity API for all front-end interaction; do not add manual DOM listeners or another framework.
- Keep source in `testimonial-carousel/src/` and generated files in `testimonial-carousel/build/`.
- Produce semantic, accessible markup with visible keyboard focus.
- Do not modify `.agents/skills/`.

## Design and Responsive Contract

- Inspect the supplied Figma frame once with Figma MCP and treat it as the source of truth.
- Reuse assets from `design-assets/` when available.
- Use Inter when provided by the theme; otherwise use a system sans-serif fallback.
- Above `900px`, show all three testimonials with no controls.
- At `900px` and below, show one testimonial with accessible previous and next controls powered by the Interactivity API.
- Support full-width alignment without the theme constraining the block to its content width.

## Fast Mode

- Format before validating to avoid repeated lint cycles.
- Run the production build, JavaScript lint, CSS lint, and PHP syntax checks.
- Start Playground from the plugin directory with:

  ```bash
  npx @wp-playground/cli@3.1.49 start --port=9400 --wp=7.0.3 --php=8.3
  ```

- Confirm activation and create the published test page programmatically when possible.
- Validate only one desktop and one mobile viewport.
- On mobile, test one pointer action and one keyboard action.
- Check plugin console errors and capture exactly two final screenshots after all fixes.
- Keep browser inspection targeted. Do not output full-page DOM snapshots, intermediate screenshots, traces, or full network logs.
- Use Chrome DevTools only when the primary browser check exposes a specific problem.

## Done

- The plugin activates, the published block matches the design, and responsive interaction works.
- Build, lint, and PHP checks pass with no plugin console errors.
- Report the checks performed and any remaining visual differences.
