console.log('hello world')
        // Navigation
        function showSection(sectionName) {
            // Hide all sections
            document.querySelectorAll('.content-section').forEach(section => {
                section.classList.add('hidden');
            });
            
            // Show selected section
            document.getElementById(sectionName + '-section').classList.remove('hidden');
            
            // Update active nav link
            document.querySelectorAll('.nav-link').forEach(link => {
                link.classList.remove('active', 'bg-indigo-50', 'text-indigo-600');
                link.classList.add('text-gray-700');
            });
            
            event.target.closest('.nav-link').classList.add('active', 'bg-indigo-50', 'text-indigo-600');
            event.target.closest('.nav-link').classList.remove('text-gray-700');
            
            // Close sidebar on mobile
            if (window.innerWidth < 1024) {
                toggleSidebar();
            }
        }

        // Sidebar Toggle
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('overlay');
            
            sidebar.classList.toggle('-translate-x-full');
            overlay.classList.toggle('hidden');
        }

        document.getElementById('menuToggle').addEventListener('click', toggleSidebar);

        // Profile Dropdown
       

        // Product Modal Functions
       

        // Initialize - show products by default
      
    