# Design and Style Guide for the Project

This guide outlines the design principles, color schemes, typography, and reusable components based on the provided CSS file. It serves as a reference for maintaining consistency across the project.

---

## 1. General Design Principles

### Colour Palette:
- **Background**: `#FFF4E9` (Soft Beige)
- **Main (design elements)**: `#D4BEE4` (Light Lavender)
- **Accents (design text)**: `#441752` (Deep Purple)
- **Buttons (clickable elements)**: `#ca637d` (Muted Pink)
- **Neutral (text boxes, displayed info)**: `#cfcfcf` (Light Gray)


### Typography:
- **Font Family**: `Georgia, 'Times New Roman', Times, serif`
- **Font Weight**: Use `bold` for emphasis (e.g., buttons, headers).
- **Font Sizes**:
  - General Text: `15px`
  - Buttons: `16px` to `22px`
  - Titles/Headers: `20px` to `30px`
- **Font Color for design elements**: `#441752` (Deep Purple)
- **Font Color for info elements**: `#000000` (Black)

### Borders and Corners:
- Use rounded corners (`border-radius: 10px` or `50px`) for a soft, modern look.
- Avoid sharp edges for buttons, modals, and containers.

### Spacing:
- Use consistent padding and margins for spacing:
  - **Buttons**: `padding: 10px 32px; margin: 10px;`
  - **Containers**: `padding: 20px; margin: 10px;`

### Hover Effects:
- Add subtle hover effects for buttons and interactive elements:
  - **Example**: `opacity: 0.9` on hover.

---

## 2. Layout and Structure

### Alignment
- Most elements should be centered for a mobile-first design

### Responsive Design:
- Use media queries for responsiveness:
  - **Example**: Adjust button widths and flex directions for screens smaller than `800px`.

### Header
- "booked" link always visible in top-left.
 - `font-family: Georgia, 'Times New Roman', Times, serif;`
 - `font-weight: bold;`
 - `font-size: 30px;`
