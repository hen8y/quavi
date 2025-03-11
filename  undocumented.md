# Button Component

button component: supports loading states, different sizes, and themes.

## Basic Usage

```blade
<x-quavi::button 
    label="Submit" 
    target="save" />
```

## Props

### Essential Props
| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `label` | string | "Submit" | The button's text content |
| `target` | string | required | Livewire action name for loading state |
| `loadingText` | string | "Processing..." | Text shown during loading state |
| `disabled` | boolean | false | Disables the button when true |

### Styling Props
| Prop | Type | Default | Options | Description |
|------|------|---------|---------|-------------|
| `variant` | string | "primary" | "primary", "secondary" | Button color theme |
| `size` | string | "md" | "sm", "md", "full" | Button size preset |
| `class` | string | "" | any classes | Additional CSS classes |
| `loadingStateClass` | string | "" | any classes | Additional classes for loading state |

## Size Variants

### Small (sm)
```blade
<x-quavi::button 
    label="Small Button" 
    size="sm"
    target="action" />
```
- Compact padding
- Auto width
- Smaller text

### Medium (md) - Default
```blade
<x-quavi::button 
    label="Medium Button" 
    size="md"
    target="action" />
```
- Standard padding
- Full width
- Base text size

### Full Width (full)
```blade
<x-quavi::button 
    label="Large Button" 
    size="full"
    target="action" />
```
- More padding
- Full width
- Larger text

## Theme Variants

### Primary (Default)
```blade
<x-quavi::button 
    label="Primary Button" 
    variant="primary"
    target="action" />
```
- Red background
- White text
- Dark gradient on hover

### Secondary
```blade
<x-quavi::button 
    label="Secondary Button" 
    variant="secondary"
    target="action" />
```
- Gray background
- Dark text
- Light gradient on hover

## Advanced Usage

### Custom Classes
```blade
<x-quavi::button 
    label="Custom Button" 
    class="my-8 mx-4"
    loadingStateClass="bg-opacity-90"
    target="action" />
```

### Disabled State
```blade
<x-quavi::button 
    label="Disabled Button" 
    disabled="true"
    target="action" />
```

### With Dynamic Loading Text
```blade
<x-quavi::button 
    label="Save Changes" 
    loadingText="Saving..."
    target="save" />
```

## Loading States

The button automatically handles loading states when used with Livewire:
- Shows loading spinner
- Displays loading text
- Disables button interaction
- Changes background gradient
- Maintains consistent width

## Best Practices

1. Always provide a `target` prop that matches your Livewire action
2. Use consistent sizing within the same form/section
3. Choose appropriate variants for action hierarchy:
   - Primary for main actions
   - Secondary for alternative actions
4. Keep button labels concise and action-oriented

## Examples

### Form Submit Button
```blade
<form wire:submit="save">
    <!-- form fields -->
    <x-quavi::button 
        label="Save Changes"
        target="save"
        size="full" />
</form>
```