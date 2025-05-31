// Initialize profile data from localStorage or set defaults
let profileData = JSON.parse(localStorage.getItem('profileData')) || {
    fullName: 'Faris Zain As-Shadiq',
    username: 'Zeyn',
    email: 'FarisZain@gmail.com',
    phone: '085142233633',
    bio: 'Project Manager dengan pengalaman 5 tahun dalam pengembangan aplikasi web dan mobile.',
    avatar: '/api/placeholder/100/100'
};

// Update UI with profile data
function updateProfileUI() {
    const elements = {
        'full-name': profileData.fullName,
        'username': profileData.username,
        'email': profileData.email,
        'phone': profileData.phone,
        'bio': profileData.bio,
        'profile-avatar': profileData.avatar,
        'dropdown-avatar': profileData.avatar,
        'dropdown-name': profileData.fullName,
        'dropdown-email': profileData.email
    };

    for (const [id, value] of Object.entries(elements)) {
        const element = document.getElementById(id);
        if (element) {
            if (element.tagName === 'INPUT' || element.tagName === 'TEXTAREA') {
                element.value = value;
            } else if (element.tagName === 'IMG') {
                element.src = value;
            } else {
                element.textContent = value;
            }
        }
    }
}

// Save profile data to localStorage
function saveProfileData() {
    localStorage.setItem('profileData', JSON.stringify(profileData));
    updateProfileUI();
}

// Update profile data (used by profile form or other updates)
function updateProfile(newData) {
    profileData = { ...profileData, ...newData };
    saveProfileData();
}

// Initialize the page
document.addEventListener('DOMContentLoaded', () => {
    // Update profile UI
    updateProfileUI();

    // Navbar scroll behavior
    const navbar = document.querySelector('nav');
    const mainSection = document.querySelector('.main');
    if (navbar && mainSection) {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    // When in hero section

                    navbar.classList.remove('dark:bg-gray-900', 'dark:border-gray-700');
                    navbar.classList.add('bg-transparent', 'border-transparent');
                    console.log("test");
                    document.querySelectorAll('#navbar-user a, .navbar span').forEach(el => {
                        el.classList.remove('text-gray-900');
                        el.classList.add('text-white');
                    });
                    document.querySelector('.navbar button')?.classList.remove('text-gray-900');
                } else {

                    // When scrolled down
                    navbar.classList.remove('bg-transparent', 'border-transparent');
                    navbar.classList.add('dark:bg-gray-900', 'dark:border-gray-700');
                    document.querySelector('.navbar button')?.classList.add('text-gray-900');
                    
                }
            });
        }, { threshold: 0.1 });
        observer.observe(mainSection);
    }

    // Hamburger menu toggle
    const hamburger = document.getElementById('hamburger-menu');
    const navMenu = document.getElementById('navbar-user');
    if (hamburger && navMenu) {
        hamburger.addEventListener('click', () => {
            navMenu.classList.toggle('hidden');
        });
    }

    // User dropdown toggle
    const userButton = document.getElementById('user-menu-button');
    const userDropdown = document.getElementById('user-dropdown');
    if (userButton && userDropdown) {
        userButton.addEventListener('click', () => {
            userDropdown.classList.toggle('hidden');
        });
        document.addEventListener('click', (e) => {
            if (!userButton.contains(e.target) && !userDropdown.contains(e.target)) {
                userDropdown.classList.add('hidden');
            }
        });
    }

    // Modal functionality (ticket modal)
    const buyTicketButtons = document.querySelectorAll('.buy-ticket-btn');
    const ticketModal = document.getElementById('ticket-modal');
    const closeTicket = document.getElementById('close-ticket');
    if (ticketModal) {
        buyTicketButtons.forEach(button => {
            button.addEventListener('click', () => {
                ticketModal.classList.remove('hidden');
            });
        });
        if (closeTicket) {
            closeTicket.addEventListener('click', () => {
                ticketModal.classList.add('hidden');
            });
        }
        window.addEventListener('click', (e) => {
            if (e.target === ticketModal) {
                ticketModal.classList.add('hidden');
            }
        });
    }

    // Register modal close on click outside
    const registerModal = document.getElementById('register-modal');
    if (registerModal) {
        window.addEventListener('click', (e) => {
            if (e.target === registerModal) {
                registerModal.classList.add('hidden');
            }
        });
    }

    // Toggle password visibility
    document.querySelectorAll('.toggle-password').forEach(icon => {
        icon.addEventListener('click', () => {
            const input = icon.previousElementSibling;
            if (input) {
                input.type = input.type === 'password' ? 'text' : 'password';
                icon.classList.toggle('fa-eye');
                icon.classList.toggle('fa-eye-slash');
            }
        });
    });

    // Handle profile form submission
    const profileForm = document.getElementById('profile-form');
    if (profileForm) {
        profileForm.addEventListener('submit', (e) => {
            e.preventDefault();
            profileData.fullName = document.getElementById('full-name')?.value.trim() || profileData.fullName;
            profileData.phone = document.getElementById('phone')?.value.trim() || profileData.phone;
            profileData.bio = document.getElementById('bio')?.value.trim() || profileData.bio;
            saveProfileData();
            alert('Informasi profil berhasil diperbarui!');
        });
    }

    // Handle photo upload
    const uploadPhoto = document.getElementById('upload-photo');
    if (uploadPhoto) {
        uploadPhoto.addEventListener('change', (e) => {
            const file = e.target.files[0];
            if (file && file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = (event) => {
                    profileData.avatar = event.target.result;
                    saveProfileData();
                };
                reader.readAsDataURL(file);
            } else {
                alert('Harap unggah file gambar!');
            }
        });
    }

    // Handle password form submission (placeholder)
    const passwordForm = document.getElementById('password-form');
    if (passwordForm) {
        passwordForm.addEventListener('submit', (e) => {
            e.preventDefault();
            alert('Fungsi ubah password belum diimplementasikan sepenuhnya.');
        });
    }
});

function scrollToGallery() {
    document.getElementById('event-gallery').scrollIntoView({ behavior: 'smooth' });
  }