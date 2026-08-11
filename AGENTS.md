# Repository Instructions

## Purpose

- This repository contains one standalone WordPress plugin.
- Keep the repository root installable as the plugin directory.
- Follow the official WordPress Agent Skills included in `.agents/skills/`.

## Implementation Standards

- Use modern WordPress block APIs and `block.json` metadata.
- Implement front-end interaction with the WordPress Interactivity API. Do not use ad-hoc DOM event listeners or an unrelated JavaScript framework.
- Register interactive modules through `viewScriptModule` and use `data-wp-*` directives, stores, state, and context according to current WordPress guidance.
- Keep editable source files in `src/` and generated assets in `build/`.
- Prefer `@wordpress/scripts` for the JavaScript build and quality checks.
- Follow WordPress coding standards and use translatable user-facing strings.
- Produce semantic, accessible, responsive markup.
- Keep editor and front-end presentation visually consistent.
- Do not modify files inside `.agents/skills/`.

## Design Workflow

- Treat the Figma frame supplied in the task as the source of truth.
- Use Figma MCP to inspect layout, typography, spacing, colors, content, and reusable assets.
- Reuse local assets when Figma provides them; do not invent replacements without reporting it.

## Validation Workflow

- Install dependencies and run the available build and lint commands.
- Start the plugin locally from the repository root with `npx @wp-playground/cli@latest start`.
- Use Playwright to verify the complete user flow: activate the plugin, insert and edit the block, publish the page, reload it, and inspect the front end.
- Use Chrome DevTools MCP to inspect console errors, failed network requests, rendered styles, and responsive behavior.
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
