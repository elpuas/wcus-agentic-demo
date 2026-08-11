# Agentic Testimonial Block Demo

This intentionally minimal repository supports the live task shown in the WCUS 2026 session **Agentic Development: Building with AI Workers, Not Just AI Chat**.

The demonstration begins with project instructions and official WordPress Agent Skills, but without an implemented plugin. A short task prompt and a Figma frame provide the desired outcome. Codex must discover the relevant workflow, build the WordPress plugin and testimonial block, run it in WordPress Playground, and validate the result in a real browser.

## The three pillars

1. **Project instructions:** [`AGENTS.md`](AGENTS.md)
2. **Reusable workflows:** official [WordPress Agent Skills](https://github.com/WordPress/agent-skills)
3. **External tools:** Figma MCP, Playwright, Chrome DevTools MCP, and WordPress Playground

## Local environment

The completed plugin is designed to run from the repository root:

```bash
npx @wp-playground/cli@latest start
```

The Playground CLI detects and mounts a plugin automatically when started from its directory.

## Source material

The testimonial design will be supplied as a Figma frame when the demo task begins.
