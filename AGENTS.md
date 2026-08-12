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

## Execution Mode

- Use Fast Mode by default.
- Upgrade to Full Acceptance Mode only when explicitly requested, when preparing a release, or when Fast Mode exposes a problem that needs deeper validation.
- Fix issues discovered in either mode before reporting completion.

### Fast Mode

- Inspect the supplied Figma frame once with `get_design_context`.
- Run the production build, JavaScript lint, CSS lint, and PHP syntax checks available in the scaffold.
- Start the pinned local Playground environment defined above and verify plugin activation.
- Create the test page programmatically when possible; editor UI navigation is not required in Fast Mode.
- Use Playwright as the primary browser validation tool:
  - Validate one desktop viewport above `900px` and one mobile viewport at or below `900px`.
  - Test one pointer navigation action and one keyboard navigation action on mobile.
  - Check for browser console errors caused by the plugin.
  - Capture exactly one final desktop screenshot and one final mobile screenshot, only after all fixes.
- Keep browser inspection targeted and token-efficient:
  - Take a snapshot only when element references are needed or after a meaningful page-state change.
  - Reuse valid element references and inspect only the testimonial block or a specific failing element.
  - Skip intermediate screenshots, editor reload testing, traces, complete DOM output, and full network logs unless a failure requires them.
- Use Chrome DevTools MCP only when Playwright reveals a console, network, performance, or layout problem. Inspect only the failing data and do not repeat checks that already passed.

### Full Acceptance Mode

- Perform all Fast Mode checks.
- Verify the complete editor workflow: insert the block, edit its content, publish the page, reload the editor, and confirm there are no block-validation errors.
- Perform expanded accessibility and responsive checks across relevant states and viewports.
- Use Chrome DevTools MCP for unresolved console, network, performance, or layout problems.
- Retain additional browser artifacts only when they document a failure or are explicitly requested.

## Definition of Done

- The plugin activates without PHP errors.
- The block renders correctly on a published test page. Complete editor insert/edit/save/reload verification is required only in Full Acceptance Mode.
- Testimonial navigation works through the Interactivity API with accessible previous and next controls and useful status announcements.
- The editor and front end follow the supplied Figma design at desktop and mobile widths.
- Keyboard interaction, heading structure, contrast, and visible focus states are accessible.
- Build and lint commands pass.
- The browser console contains no errors caused by the plugin.
- The final response summarizes files changed, checks run, and any remaining visual differences.
