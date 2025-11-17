// Sample property data
const properties = [
    {
        id: 1,
        title: "Modern Downtown Apartment",
        location: "123 Main St, New York, NY",
        price: 450000,
        type: "apartment",
        bedrooms: 2,
        bathrooms: 2,
        sqft: 1200,
        lat: 40.7128,
        lng: -74.0060,
        image: "https://images.unsplash.com/photo-1522708323590-d24dbb6b0267?w=800",
        description: "Beautiful modern apartment in the heart of downtown with stunning city views."
    },
    {
        id: 2,
        title: "Luxury Family House",
        location: "456 Oak Avenue, Los Angeles, CA",
        price: 850000,
        type: "house",
        bedrooms: 4,
        bathrooms: 3,
        sqft: 2500,
        lat: 34.0522,
        lng: -118.2437,
        image: "https://images.unsplash.com/photo-1568605114967-8130f3a36994?w=800",
        description: "Spacious family home with large backyard and modern amenities."
    },
    {
        id: 3,
        title: "Beachfront Villa",
        location: "789 Ocean Drive, Miami, FL",
        price: 1200000,
        type: "villa",
        bedrooms: 5,
        bathrooms: 4,
        sqft: 3500,
        lat: 25.7617,
        lng: -80.1918,
        image: "https://images.unsplash.com/photo-1613490493576-7fde63acd811?w=800",
        description: "Stunning beachfront villa with private pool and direct beach access."
    },
    {
        id: 4,
        title: "Cozy Downtown Condo",
        location: "321 Park Blvd, San Francisco, CA",
        price: 650000,
        type: "condo",
        bedrooms: 1,
        bathrooms: 1,
        sqft: 900,
        lat: 37.7749,
        lng: -122.4194,
        image: "https://images.unsplash.com/photo-1545324418-cc1a3fa10c00?w=800",
        description: "Charming condo in a prime location with easy access to public transport."
    },
    {
        id: 5,
        title: "Suburban Family Home",
        location: "555 Maple Street, Chicago, IL",
        price: 420000,
        type: "house",
        bedrooms: 3,
        bathrooms: 2,
        sqft: 1800,
        lat: 41.8781,
        lng: -87.6298,
        image: "https://images.unsplash.com/photo-1570129477492-45c003edd2be?w=800",
        description: "Perfect family home in a quiet suburban neighborhood with excellent schools nearby."
    },
    {
        id: 6,
        title: "Modern High-Rise Apartment",
        location: "777 Skyline Ave, Seattle, WA",
        price: 520000,
        type: "apartment",
        bedrooms: 2,
        bathrooms: 2,
        sqft: 1100,
        lat: 47.6062,
        lng: -122.3321,
        image: "https://images.unsplash.com/photo-1502672260266-1c1ef2d93688?w=800",
        description: "Contemporary apartment with floor-to-ceiling windows and city skyline views."
    },
    {
        id: 7,
        title: "Historic Townhouse",
        location: "888 Heritage Lane, Boston, MA",
        price: 780000,
        type: "house",
        bedrooms: 3,
        bathrooms: 2.5,
        sqft: 2200,
        lat: 42.3601,
        lng: -71.0589,
        image: "https://images.unsplash.com/photo-1564013799919-ab600027ffc6?w=800",
        description: "Charming historic townhouse with original character and modern updates."
    },
    {
        id: 8,
        title: "Penthouse Condo",
        location: "999 Luxury Blvd, Las Vegas, NV",
        price: 980000,
        type: "condo",
        bedrooms: 3,
        bathrooms: 3,
        sqft: 2800,
        lat: 36.1699,
        lng: -115.1398,
        image: "https://images.unsplash.com/photo-1512918728675-ed5a9ecdebfd?w=800",
        description: "Spectacular penthouse with panoramic views and premium finishes throughout."
    }
];

let map;
let markers = [];
let filteredProperties = [...properties];
let selectedProperty = null;
let favoriteIds = new Set(JSON.parse(localStorage.getItem('favoritePropertyIds') || '[]'));
let isFavoritesView = false;
let currentSort = '';
let isAerialView = false;

// Initialize Google Map
function initMap() {
    // Default center (New York)
    const center = { lat: 40.7128, lng: -74.0060 };
    
    // Create map
    map = new google.maps.Map(document.getElementById('map'), {
        zoom: 4,
        center: center,
        mapTypeId: 'roadmap',
        styles: [
            {
                featureType: "poi",
                elementType: "labels",
                stylers: [{ visibility: "off" }]
            }
        ]
    });

    // Load properties on map
    loadProperties();
    
    // Initialize map view toggle after map is created
    const mapViewToggle = document.getElementById('mapViewToggle');
    if (mapViewToggle) {
        mapViewToggle.addEventListener('click', () => {
            if (map.getMapTypeId() === 'satellite' || map.getMapTypeId() === 'hybrid') {
                map.setMapTypeId('roadmap');
                mapViewToggle.textContent = '🛰️ Satellite';
            } else {
                map.setMapTypeId('satellite');
                mapViewToggle.textContent = '🗺️ Map';
            }
        });
    }
}

// Load properties on map and list
function loadProperties() {
    // Clear existing markers
    markers.forEach(marker => marker.setMap(null));
    markers = [];

    // Add markers to map
    filteredProperties.forEach(property => {
        const marker = new google.maps.Marker({
            position: { lat: property.lat, lng: property.lng },
            map: map,
            title: property.title,
            icon: {
                url: 'http://maps.google.com/mapfiles/ms/icons/red-dot.png',
                scaledSize: new google.maps.Size(40, 40)
            },
            animation: google.maps.Animation.DROP
        });

        // Info window for marker
        const infoWindow = new google.maps.InfoWindow({
            content: `
                <div style="padding: 10px; max-width: 250px;">
                    <h3 style="margin: 0 0 5px 0; font-size: 16px;">${property.title}</h3>
                    <p style="margin: 0 0 5px 0; color: #666; font-size: 12px;">${property.location}</p>
                    <p style="margin: 0; font-size: 18px; font-weight: bold; color: #667eea;">$${property.price.toLocaleString()}</p>
                </div>
            `
        });

        marker.addListener('click', () => {
            // Close other info windows
            markers.forEach(m => {
                if (m.infoWindow) {
                    m.infoWindow.close();
                }
            });
            
            infoWindow.open(map, marker);
            marker.infoWindow = infoWindow;
            
            // Highlight property card
            highlightProperty(property.id);
            showPropertyModal(property);
        });

        marker.addListener('mouseover', () => {
            infoWindow.open(map, marker);
        });

        marker.addListener('mouseout', () => {
            setTimeout(() => {
                if (marker.infoWindow) {
                    marker.infoWindow.close();
                }
            }, 300);
        });

        markers.push(marker);
    });

    // Fit map to show all markers
    if (filteredProperties.length > 0) {
        const bounds = new google.maps.LatLngBounds();
        filteredProperties.forEach(property => {
            bounds.extend({ lat: property.lat, lng: property.lng });
        });
        map.fitBounds(bounds);
        
        // Adjust zoom if too zoomed out
        google.maps.event.addListenerOnce(map, 'bounds_changed', function() {
            if (map.getZoom() > 15) {
                map.setZoom(15);
            }
        });
    }

    // Render property list
    renderPropertyList();
    updatePropertyCount();
}

// Render property list
function renderPropertyList() {
    const propertiesList = document.getElementById('propertiesList');
    
    if (filteredProperties.length === 0) {
        propertiesList.innerHTML = '<div class="no-results">No properties found matching your search criteria.</div>';
        return;
    }

    propertiesList.innerHTML = filteredProperties.map(property => `
        <div class="property-card" data-property-id="${property.id}" onclick="selectProperty(${property.id})">
            <button class="favorite-btn ${favoriteIds.has(property.id) ? 'active' : ''}" title="Toggle favorite" onclick="toggleFavorite(event, ${property.id})">${favoriteIds.has(property.id) ? '❤️' : '🤍'}</button>
            <img src="${property.image}" alt="${property.title}" class="property-image" onerror="this.src='https://via.placeholder.com/800x400?text=Property+Image'">
            <h3 class="property-title">${property.title}</h3>
            <p class="property-location">📍 ${property.location}</p>
            <p class="property-price">$${property.price.toLocaleString()}</p>
            <span class="property-type">${property.type.charAt(0).toUpperCase() + property.type.slice(1)}</span>
            <div class="property-details">
                <div class="property-detail-item">🛏️ ${property.bedrooms} bed</div>
                <div class="property-detail-item">🚿 ${property.bathrooms} bath</div>
                <div class="property-detail-item">📐 ${property.sqft.toLocaleString()} sqft</div>
            </div>
        </div>
    `).join('');
}

// Select property from list
function selectProperty(propertyId) {
    const property = properties.find(p => p.id === propertyId);
    if (!property) return;

    selectedProperty = property;
    
    // Highlight card
    highlightProperty(propertyId);
    
    // Center map on property
    map.setCenter({ lat: property.lat, lng: property.lng });
    map.setZoom(12);
    
    // Show marker info window
    const marker = markers.find(m => {
        const prop = filteredProperties.find(p => 
            p.lat === m.position.lat() && p.lng === m.position.lng()
        );
        return prop && prop.id === propertyId;
    });
    
    if (marker) {
        marker.infoWindow.open(map, marker);
    }
    
    // Show modal
    showPropertyModal(property);
}

// Highlight property card
function highlightProperty(propertyId) {
    document.querySelectorAll('.property-card').forEach(card => {
        card.classList.remove('highlighted');
        if (parseInt(card.dataset.propertyId) === propertyId) {
            card.classList.add('highlighted');
            card.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
        }
    });
}

// Show property modal
function showPropertyModal(property) {
    const modal = document.getElementById('propertyModal');
    const modalBody = document.getElementById('modalBody');
    
    modalBody.innerHTML = `
        <img src="${property.image}" alt="${property.title}" class="modal-image" onerror="this.src='https://via.placeholder.com/800x400?text=Property+Image'">
        <h2 class="modal-title">${property.title}</h2>
        <p class="modal-price">$${property.price.toLocaleString()}</p>
        <p class="property-location">📍 ${property.location}</p>
        <p class="modal-description">${property.description}</p>
        <div class="modal-details">
            <div class="modal-detail-item">
                <div class="modal-detail-label">Type</div>
                <div class="modal-detail-value">${property.type.charAt(0).toUpperCase() + property.type.slice(1)}</div>
            </div>
            <div class="modal-detail-item">
                <div class="modal-detail-label">Bedrooms</div>
                <div class="modal-detail-value">${property.bedrooms}</div>
            </div>
            <div class="modal-detail-item">
                <div class="modal-detail-label">Bathrooms</div>
                <div class="modal-detail-value">${property.bathrooms}</div>
            </div>
            <div class="modal-detail-item">
                <div class="modal-detail-label">Square Feet</div>
                <div class="modal-detail-value">${property.sqft.toLocaleString()}</div>
            </div>
        </div>
    `;
    
    modal.style.display = 'block';
}

// Close modal
document.addEventListener('DOMContentLoaded', () => {
    const modal = document.getElementById('propertyModal');
    const closeBtn = document.querySelector('.close');
    
    if (closeBtn) {
        closeBtn.addEventListener('click', () => {
            modal.style.display = 'none';
        });
    }
    
    window.addEventListener('click', (e) => {
        if (e.target === modal) {
            modal.style.display = 'none';
        }
    });
});

// Update property count
function updatePropertyCount() {
    document.getElementById('propertyCount').textContent = filteredProperties.length;
}

function updateFavoritesCount() {
    const countEl = document.getElementById('favoritesCount');
    if (countEl) {
        countEl.textContent = favoriteIds.size;
    }
}

function saveFavorites() {
    localStorage.setItem('favoritePropertyIds', JSON.stringify([...favoriteIds]));
    updateFavoritesCount();
}

// Toggle favorite from card heart
function toggleFavorite(event, propertyId) {
    event.stopPropagation();
    if (favoriteIds.has(propertyId)) {
        favoriteIds.delete(propertyId);
    } else {
        favoriteIds.add(propertyId);
    }
    saveFavorites();

    // If viewing favorites, keep only favorites in view
    if (isFavoritesView) {
        filteredProperties = filteredProperties.filter(p => favoriteIds.has(p.id));
        loadProperties();
    } else {
        // Just re-render list to update heart states
        renderPropertyList();
    }
}

// Search functionality
function performSearch() {
    const searchTerm = document.getElementById('searchInput').value.toLowerCase();
    const typeFilter = document.getElementById('typeFilter').value;
    const priceFilter = document.getElementById('priceFilter').value;
    
    let base = properties.filter(property => {
        // Text search
        const matchesSearch = !searchTerm || 
            property.title.toLowerCase().includes(searchTerm) ||
            property.location.toLowerCase().includes(searchTerm) ||
            property.type.toLowerCase().includes(searchTerm);
        
        // Type filter
        const matchesType = !typeFilter || property.type === typeFilter;
        
        // Price filter
        let matchesPrice = true;
        if (priceFilter) {
            if (priceFilter === '0-300000') {
                matchesPrice = property.price < 300000;
            } else if (priceFilter === '300000-500000') {
                matchesPrice = property.price >= 300000 && property.price < 500000;
            } else if (priceFilter === '500000-800000') {
                matchesPrice = property.price >= 500000 && property.price < 800000;
            } else if (priceFilter === '800000+') {
                matchesPrice = property.price >= 800000;
            }
        }
        
        return matchesSearch && matchesType && matchesPrice;
    });
    
    // If favorites view is active, filter to favorites only
    let result = isFavoritesView ? base.filter(p => favoriteIds.has(p.id)) : base;

    // Apply sorting
    result = applySort(result);
    
    filteredProperties = result;
    
    loadProperties();
}

function applySort(arr) {
    if (!currentSort) return arr.slice();
    const copy = arr.slice();
    if (currentSort === 'price-asc') {
        copy.sort((a, b) => a.price - b.price);
    } else if (currentSort === 'price-desc') {
        copy.sort((a, b) => b.price - a.price);
    } else if (currentSort === 'beds-desc') {
        copy.sort((a, b) => (b.bedrooms || 0) - (a.bedrooms || 0));
    } else if (currentSort === 'sqft-desc') {
        copy.sort((a, b) => (b.sqft || 0) - (a.sqft || 0));
    }
    return copy;
}

// Event listeners
document.addEventListener('DOMContentLoaded', () => {
    // Search button
    document.getElementById('searchBtn').addEventListener('click', performSearch);
    
    // Enter key in search input
    document.getElementById('searchInput').addEventListener('keypress', (e) => {
        if (e.key === 'Enter') {
            performSearch();
        }
    });
    
    // Filter change
    document.getElementById('typeFilter').addEventListener('change', performSearch);
    document.getElementById('priceFilter').addEventListener('change', performSearch);
    
    // Real-time search (optional)
    let searchTimeout;
    document.getElementById('searchInput').addEventListener('input', () => {
        clearTimeout(searchTimeout);
        searchTimeout = setTimeout(performSearch, 300);
    });

    // Favorites tab toggle
    const favoritesTab = document.getElementById('favoritesTab');
    if (favoritesTab) {
        favoritesTab.addEventListener('click', () => {
            isFavoritesView = !isFavoritesView;
            favoritesTab.classList.toggle('active', isFavoritesView);
            performSearch();
        });
    }

    // Initialize favorites count on load
    updateFavoritesCount();

    // Sort change
    const sortSelect = document.getElementById('sortSelect');
    if (sortSelect) {
        sortSelect.addEventListener('change', () => {
            currentSort = sortSelect.value;
            performSearch();
        });
    }

    // Theme toggle (Dark/Light mode)
    const themeToggle = document.getElementById('themeToggle');
    if (themeToggle) {
        // Load saved theme preference
        const savedTheme = localStorage.getItem('theme');
        if (savedTheme === 'dark') {
            document.body.classList.add('dark-mode');
            themeToggle.textContent = '☀️';
        }

        themeToggle.addEventListener('click', () => {
            document.body.classList.toggle('dark-mode');
            const isDarkMode = document.body.classList.contains('dark-mode');
            
            // Update button icon
            themeToggle.textContent = isDarkMode ? '☀️' : '🌙';
            
            // Save preference
            localStorage.setItem('theme', isDarkMode ? 'dark' : 'light');
            
            // Update settings checkbox if it exists
            const settingsDarkMode = document.getElementById('settingsDarkMode');
            if (settingsDarkMode) {
                settingsDarkMode.checked = isDarkMode;
            }
        });
    }

    // Sidebar functionality
    const sidebar = document.getElementById('sidebar');
    const sidebarToggle = document.getElementById('sidebarToggle');
    const sidebarClose = document.getElementById('sidebarClose');
    const sidebarOverlay = document.getElementById('sidebarOverlay');
    const sidebarItems = document.querySelectorAll('.sidebar-item');
    const sidebarPanels = document.querySelectorAll('.sidebar-panel');
    const sidebarContent = document.getElementById('sidebarContent');

    // Open sidebar
    function openSidebar() {
        sidebar.classList.add('active');
        sidebarOverlay.classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    // Close sidebar
    function closeSidebar() {
        sidebar.classList.remove('active');
        sidebarOverlay.classList.remove('active');
        document.body.style.overflow = '';
    }

    // Toggle sidebar
    if (sidebarToggle) {
        sidebarToggle.addEventListener('click', openSidebar);
    }

    if (sidebarClose) {
        sidebarClose.addEventListener('click', closeSidebar);
    }

    if (sidebarOverlay) {
        sidebarOverlay.addEventListener('click', closeSidebar);
    }

    // Handle tab switching
    sidebarItems.forEach(item => {
        item.addEventListener('click', (e) => {
            e.preventDefault();
            const tabName = item.getAttribute('data-tab');
            
            // Update active state
            sidebarItems.forEach(i => i.classList.remove('active'));
            item.classList.add('active');
            
            // Show corresponding panel
            sidebarPanels.forEach(panel => panel.classList.remove('active'));
            const targetPanel = document.getElementById(tabName + 'Panel');
            if (targetPanel) {
                targetPanel.classList.add('active');
                
                // Open content panel if not home
                if (tabName !== 'home') {
                    sidebarContent.classList.add('active');
                } else {
                    sidebarContent.classList.remove('active');
                }
            }
            
            // Close sidebar on mobile after selection
            if (window.innerWidth <= 768) {
                closeSidebar();
            }
        });
    });

    // Settings panel - sync dark mode checkbox
    const settingsDarkMode = document.getElementById('settingsDarkMode');
    if (settingsDarkMode) {
        // Set initial state
        settingsDarkMode.checked = document.body.classList.contains('dark-mode');
        
        // Handle checkbox change
        settingsDarkMode.addEventListener('change', () => {
            if (settingsDarkMode.checked) {
                document.body.classList.add('dark-mode');
                if (themeToggle) themeToggle.textContent = '☀️';
            } else {
                document.body.classList.remove('dark-mode');
                if (themeToggle) themeToggle.textContent = '🌙';
            }
            localStorage.setItem('theme', settingsDarkMode.checked ? 'dark' : 'light');
        });
    }

    // Close content panel when clicking outside (on home)
    document.addEventListener('click', (e) => {
        if (sidebarContent.classList.contains('active') && 
            !sidebarContent.contains(e.target) && 
            !e.target.closest('.sidebar-item')) {
            const activeItem = document.querySelector('.sidebar-item.active');
            if (activeItem && activeItem.getAttribute('data-tab') === 'home') {
                sidebarContent.classList.remove('active');
            }
        }
    });

    // Contact form submission
    const contactForm = document.querySelector('.contact-form form');
    if (contactForm) {
        contactForm.addEventListener('submit', (e) => {
            e.preventDefault();
            alert('Thank you for your message! We will get back to you soon.');
            contactForm.reset();
        });
    }

    // Authentication System
    let currentUser = JSON.parse(localStorage.getItem('currentUser') || 'null');
    const users = JSON.parse(localStorage.getItem('users') || '[]');

    // Check if user is logged in on page load
    if (currentUser) {
        showLoggedInHomepage(currentUser);
    }

    // Modal Management
    function openModal(modalId) {
        const modal = document.getElementById(modalId);
        if (modal) {
            modal.classList.add('active');
            document.body.style.overflow = 'hidden';
        }
    }

    function closeModal(modalId) {
        const modal = document.getElementById(modalId);
        if (modal) {
            modal.classList.remove('active');
            document.body.style.overflow = '';
        }
    }

    function closeAllModals() {
        document.querySelectorAll('.auth-modal').forEach(modal => {
            modal.classList.remove('active');
        });
        document.body.style.overflow = '';
    }

    // Close modals on X click
    document.querySelectorAll('.auth-close').forEach(closeBtn => {
        closeBtn.addEventListener('click', () => {
            const modalId = closeBtn.getAttribute('data-modal');
            closeModal(modalId);
        });
    });

    // Close modals on overlay click
    document.querySelectorAll('.auth-modal').forEach(modal => {
        modal.addEventListener('click', (e) => {
            if (e.target === modal) {
                closeModal(modal.id);
            }
        });
    });

    // Sign Up Button
    const signUpBtn = document.getElementById('signUpBtn');
    if (signUpBtn) {
        signUpBtn.addEventListener('click', () => {
            openModal('signUpModal');
        });
    }

    // Login Button
    const loginBtn = document.getElementById('loginBtn');
    if (loginBtn) {
        loginBtn.addEventListener('click', () => {
            openModal('loginModal');
        });
    }

    // Switch between Sign Up and Login
    const switchToLogin = document.getElementById('switchToLogin');
    if (switchToLogin) {
        switchToLogin.addEventListener('click', (e) => {
            e.preventDefault();
            closeModal('signUpModal');
            openModal('loginModal');
        });
    }

    const switchToSignUp = document.getElementById('switchToSignUp');
    if (switchToSignUp) {
        switchToSignUp.addEventListener('click', (e) => {
            e.preventDefault();
            closeModal('loginModal');
            openModal('signUpModal');
        });
    }

    // Sign Up Form
    const signUpForm = document.getElementById('signUpForm');
    if (signUpForm) {
        signUpForm.addEventListener('submit', (e) => {
            e.preventDefault();
            
            const name = document.getElementById('signUpName').value;
            const email = document.getElementById('signUpEmail').value;
            const password = document.getElementById('signUpPassword').value;
            const confirmPassword = document.getElementById('signUpConfirmPassword').value;

            // Validation
            if (password !== confirmPassword) {
                alert('Passwords do not match!');
                return;
            }

            if (password.length < 6) {
                alert('Password must be at least 6 characters long!');
                return;
            }

            // Check if user already exists
            const existingUser = users.find(u => u.email === email);
            if (existingUser) {
                alert('An account with this email already exists!');
                return;
            }

            // Create new user
            const newUser = {
                id: Date.now().toString(),
                name: name,
                email: email,
                password: password, // In production, this should be hashed
                createdAt: new Date().toISOString()
            };

            users.push(newUser);
            localStorage.setItem('users', JSON.stringify(users));

            // Automatically log in the new user
            currentUser = newUser;
            localStorage.setItem('currentUser', JSON.stringify(currentUser));
            
            closeAllModals();
            showLoggedInHomepage(newUser);
            alert('Account created successfully! Welcome!');
            
            signUpForm.reset();
        });
    }

    // Login Form
    const loginForm = document.getElementById('loginForm');
    if (loginForm) {
        loginForm.addEventListener('submit', (e) => {
            e.preventDefault();
            
            const email = document.getElementById('loginEmail').value;
            const password = document.getElementById('loginPassword').value;

            // Find user
            const user = users.find(u => u.email === email && u.password === password);
            if (!user) {
                alert('Invalid email or password!');
                return;
            }

            // Login successful
            currentUser = user;
            localStorage.setItem('currentUser', JSON.stringify(currentUser));
            
            closeAllModals();
            showLoggedInHomepage(user);
            
            loginForm.reset();
        });
    }

    // Forgot Password Link
    const forgotPasswordLink = document.getElementById('forgotPasswordLink');
    if (forgotPasswordLink) {
        forgotPasswordLink.addEventListener('click', (e) => {
            e.preventDefault();
            closeModal('loginModal');
            openModal('forgotPasswordModal');
        });
    }

    // Switch to Login from Forgot Password
    const switchToLoginFromForgot = document.getElementById('switchToLoginFromForgot');
    if (switchToLoginFromForgot) {
        switchToLoginFromForgot.addEventListener('click', (e) => {
            e.preventDefault();
            closeModal('forgotPasswordModal');
            openModal('loginModal');
        });
    }

    // Forgot Password Form
    const forgotPasswordForm = document.getElementById('forgotPasswordForm');
    if (forgotPasswordForm) {
        forgotPasswordForm.addEventListener('submit', (e) => {
            e.preventDefault();
            
            const email = document.getElementById('forgotPasswordEmail').value;
            
            // Check if user exists
            const user = users.find(u => u.email === email);
            if (!user) {
                alert('No account found with this email address!');
                return;
            }

            // In production, you would send an email here
            // For demo purposes, we'll show the reset password modal
            alert('Password reset link sent to your email! (Demo: Opening reset password form)');
            closeModal('forgotPasswordModal');
            openModal('resetPasswordModal');
            
            // Store email for reset
            document.getElementById('resetPasswordModal').setAttribute('data-reset-email', email);
            forgotPasswordForm.reset();
        });
    }

    // Reset Password Form
    const resetPasswordForm = document.getElementById('resetPasswordForm');
    if (resetPasswordForm) {
        resetPasswordForm.addEventListener('submit', (e) => {
            e.preventDefault();
            
            const newPassword = document.getElementById('resetPasswordNew').value;
            const confirmPassword = document.getElementById('resetPasswordConfirm').value;
            const email = document.getElementById('resetPasswordModal').getAttribute('data-reset-email');

            // Validation
            if (newPassword !== confirmPassword) {
                alert('Passwords do not match!');
                return;
            }

            if (newPassword.length < 6) {
                alert('Password must be at least 6 characters long!');
                return;
            }

            // Update password
            const userIndex = users.findIndex(u => u.email === email);
            if (userIndex !== -1) {
                users[userIndex].password = newPassword; // In production, this should be hashed
                localStorage.setItem('users', JSON.stringify(users));
                
                alert('Password reset successfully! You can now login with your new password.');
                closeModal('resetPasswordModal');
                openModal('loginModal');
                resetPasswordForm.reset();
            }
        });
    }

    // Show Logged In Homepage
    function showLoggedInHomepage(user) {
        // Hide main container
        const container = document.querySelector('.container');
        if (container) {
            container.style.display = 'none';
        }

        // Show logged in homepage
        const loggedInHomepage = document.getElementById('loggedInHomepage');
        if (loggedInHomepage) {
            loggedInHomepage.style.display = 'block';
        }

        // Update user name
        const userNameElement = document.getElementById('userName');
        if (userNameElement) {
            userNameElement.textContent = user.name;
        }

        // Update saved properties count
        const savedPropertiesCount = document.getElementById('savedPropertiesCount');
        if (savedPropertiesCount) {
            const favoriteIds = new Set(JSON.parse(localStorage.getItem('favoritePropertyIds') || '[]'));
            savedPropertiesCount.textContent = favoriteIds.size;
        }

        // Hide Sign Up button, show Login button (which will be hidden)
        if (signUpBtn) signUpBtn.style.display = 'none';
        if (loginBtn) loginBtn.style.display = 'none';
    }

    // Show Main App (when logged out)
    function showMainApp() {
        // Show main container
        const container = document.querySelector('.container');
        if (container) {
            container.style.display = 'block';
        }

        // Hide logged in homepage
        const loggedInHomepage = document.getElementById('loggedInHomepage');
        if (loggedInHomepage) {
            loggedInHomepage.style.display = 'none';
        }

        // Show Sign Up button
        if (signUpBtn) signUpBtn.style.display = 'block';
        if (loginBtn) loginBtn.style.display = 'none';
    }

    // Logout Button
    const logoutBtn = document.getElementById('logoutBtn');
    if (logoutBtn) {
        logoutBtn.addEventListener('click', () => {
            if (confirm('Are you sure you want to logout?')) {
                currentUser = null;
                localStorage.removeItem('currentUser');
                showMainApp();
            }
        });
    }

    // Quick Action Buttons on Logged In Homepage
    const browsePropertiesBtn = document.getElementById('browsePropertiesBtn');
    if (browsePropertiesBtn) {
        browsePropertiesBtn.addEventListener('click', () => {
            showMainApp();
            const sidebarToggle = document.getElementById('sidebarToggle');
            if (sidebarToggle) {
                setTimeout(() => sidebarToggle.click(), 100);
            }
        });
    }

    const contactUsBtn = document.getElementById('contactUsBtn');
    if (contactUsBtn) {
        contactUsBtn.addEventListener('click', () => {
            showMainApp();
            const callTab = document.querySelector('[data-tab="call"]');
            if (callTab) {
                setTimeout(() => {
                    callTab.click();
                    const sidebarToggle = document.getElementById('sidebarToggle');
                    if (sidebarToggle) sidebarToggle.click();
                }, 100);
            }
        });
    }

    const settingsBtn = document.getElementById('settingsBtn');
    if (settingsBtn) {
        settingsBtn.addEventListener('click', () => {
            showMainApp();
            const settingsTab = document.querySelector('[data-tab="settings"]');
            if (settingsTab) {
                setTimeout(() => {
                    settingsTab.click();
                    const sidebarToggle = document.getElementById('sidebarToggle');
                    if (sidebarToggle) sidebarToggle.click();
                }, 100);
            }
        });
    }

});

// Fallback if Google Maps doesn't load
window.initMap = initMap;

// Handle Google Maps API loading error
window.gm_authFailure = function() {
    document.getElementById('map').innerHTML = `
        <div style="display: flex; align-items: center; justify-content: center; height: 100%; background: #f0f0f0; color: #666; flex-direction: column; padding: 20px; text-align: center;">
            <h3>Google Maps API Key Required</h3>
            <p>Please replace 'YOUR_API_KEY' in index.html with your Google Maps API key.</p>
            <p style="font-size: 0.9rem; margin-top: 10px;">Get your API key at: <a href="https://developers.google.com/maps/documentation/javascript/get-api-key" target="_blank">Google Cloud Console</a></p>
            <p style="font-size: 0.85rem; margin-top: 10px; color: #999;">The property listings will still work below.</p>
        </div>
    `;
};

