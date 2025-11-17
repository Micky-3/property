
    # Real Estate Listings Application

An interactive and responsive real estate listing application with Google Maps integration, search functionality, and property filtering.

## Features

- 🗺️ **Interactive Google Maps** with property markers (dots)
- 🔍 **Advanced Search** by location, price, or property type
- 📱 **Fully Responsive Design** - works on desktop, tablet, and mobile
- 🏠 **Property Listings** with detailed information
- 💫 **Interactive Features**:
  - Click on map markers to view property details
  - Click on property cards to center map and show details
  - Hover over markers for quick info
  - Modal popup with full property information
- 🎨 **Modern UI** with beautiful gradient design and smooth animations

## Setup Instructions

### 1. Get Google Maps API Key

1. Go to [Google Cloud Console](https://console.cloud.google.com/)
2. Create a new project or select an existing one
3. Enable the "Maps JavaScript API"
4. Go to "Credentials" and create an API key
5. (Optional) Restrict the API key to your domain for security

### 2. Configure API Key

Open `index.html` and replace `YOUR_API_KEY` with your actual Google Maps API key:

```html
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap" async defer></script>
```

### 3. Run the Application

Simply open `index.html` in a web browser. No server required for local development!

For production, you can host it on any static hosting service like:
- GitHub Pages
- Netlify
- Vercel
- AWS S3

## Usage

1. **Search Properties**: Type in the search bar to filter by location, price, or type
2. **Filter**: Use the dropdown filters to narrow down by property type or price range
3. **View on Map**: Click on any property card to see it on the map
4. **Explore Map**: Click on map markers (red dots) to see property details
5. **View Details**: Click any property to see full details in a modal popup

## Technologies Used

- HTML5
- CSS3 (with Flexbox and Grid)
- JavaScript (Vanilla JS)
- Google Maps JavaScript API

## Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)

## Customization

### Adding More Properties

Edit the `properties` array in `script.js`:

```javascript
const properties = [
    {
        id: 9,
        title: "Your Property Title",
        location: "Address, City, State",
        price: 500000,
        type: "house", // house, apartment, condo, villa
        bedrooms: 3,
        bathrooms: 2,
        sqft: 2000,
        lat: 40.7128,  // Latitude
        lng: -74.0060, // Longitude
        image: "image-url.jpg",
        description: "Property description"
    }
];
```

### Styling

Customize colors and styles in `styles.css`. The main color scheme uses:
- Primary: `#667eea` (Purple/Blue gradient)
- Secondary: `#764ba2` (Purple)

## License

Free to use and modify for your projects.