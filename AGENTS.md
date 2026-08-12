# Repository Instructions

## Purpose

- This repository is the workspace for one standalone WordPress plugin named `testimonial-carousel`.
- Create the plugin in `testimonial-carousel/`; keep the repository-level instructions and Skills outside the generated plugin.
- Follow the official WordPress Agent Skills included in `.agents/skills/`.

## Required Scaffold

- Start the implementation with the official WordPress scaffold. Do not hand-write an alternative plugin skeleton:

  ```bash
  npx @wordpress/create-block@4.96.0 testimonial-carousel --template @wordpress/create-block-interactive-template@2.53.0
  ```

- Preserve the scaffold's WordPress tooling and adapt the generated example into the supplied testimonial design.
- The finished testimonial must remain a dynamic block rendered by `render.php`.

## Implementation Standards

- Use modern WordPress block APIs and `block.json` metadata.
- Implement front-end interaction with the WordPress Interactivity API. Do not use ad-hoc DOM event listeners or an unrelated JavaScript framework.
- Register interactive modules through `viewScriptModule` and use `data-wp-*` directives, stores, state, and context according to current WordPress guidance.
- Keep editable source files in `testimonial-carousel/src/` and generated assets in `testimonial-carousel/build/`.
- Prefer `@wordpress/scripts` for the JavaScript build and quality checks.
- Follow WordPress coding standards and use translatable user-facing strings.
- Produce semantic, accessible, responsive markup.
- Keep editor and front-end presentation visually consistent.
- Do not modify files inside `.agents/skills/`.

## Design Workflow

- Treat the Figma frame supplied in the task as the source of truth.
- Use Figma MCP to inspect layout, typography, spacing, colors, content, and reusable assets.
- Reuse local assets when Figma provides them; do not invent replacements without reporting it.
- Use Inter when it is available from the active theme. Otherwise use a system sans-serif fallback; do not download another font.

## Responsive Behavior

- Above `900px`, display all three testimonials simultaneously without navigation controls.
- At `900px` and below, display one testimonial at a time with accessible previous and next controls.
- Mobile navigation must use the WordPress Interactivity API.
- The block must support full-width alignment and must not be constrained by the theme's normal content width.
- Treat the supplied desktop Figma frame as the visual acceptance reference. Preserve its hierarchy, spacing, colors, typography, and decorative assets while adapting the card presentation according to the mobile rules above.

## Test Environment

- Validate with WordPress `7.0.3` and PHP `8.3`.
- Use the pinned Playground CLI command from the plugin directory:

  ```bash
  npx @wp-playground/cli@3.1.49 start --wp=7.0.3 --php=8.3
  ```

## Validation Workflow

- Run the production build and the scaffold's available lint commands.
- Start the pinned local Playground environment defined above.
- Use Playwright as the primary validation tool. Verify activation, block insertion, editing, publishing, editor reload, desktop layout, mobile navigation, keyboard operation, and browser console errors.
- Use Chrome DevTools MCP only when Playwright reveals a console, network, performance, or layout problem that requires diagnosis.
- Fix issues discovered during validation before reporting completion.

## Definition of Done

- The plugin activates without PHP errors.
- The block can be inserted, edited, saved, published, and reloaded without block-validation errors.
- Testimonial navigation works through the Interactivity API with accessible previous and next controls and useful status announcements.
- The editor and front end follow the supplied Figma design at desktop and mobile widths.
- Keyboard interaction, heading structure, contrast, and visible focus states are accessible.
- Build and lint commands pass.
- The browser console contains no errors caused by the plugin.
- The final response summarizes files changed, checks run, and any remaining visual differences.
