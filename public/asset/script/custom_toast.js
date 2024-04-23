const toastr = {
    success: function (message) {
        this.showNotification(message, "bg-green-500");
    },
    alert: function (message) {
        this.showNotification(message, "bg-red-500");
    },
    info: function (message) {
        this.showNotification(message, "bg-blue-500");
    },
    showNotification: function (message, bgColor) {
        const notification = document.createElement("div");
        notification.classList.add("toastr", bgColor, "text-white", "px-4", "py-2", "rounded", "shadow-md", "fixed", "bottom-10", "right-10");
        notification.style.x_index = '9999999'; // To make sure the notifications are always on top of everything else
        notification.textContent = message;
        document.body.appendChild(notification);

        // Add appearance transition
        setTimeout(() => {
            notification.classList.add("opacity-100", "transform", "translate-y-0");
        }, 50);

        // Remove notification after a delay
        setTimeout(() => {
            // Add hiding transition
            notification.classList.remove("opacity-100", "transform", "translate-y-0");
            notification.classList.add("opacity-0", "transform", "translate-y-5");

            setTimeout(() => {
                notification.remove();
            }, 500); // Delay removal to match transition duration
        }, 3000);
    }
};

// Make toastr globally accessible
window.toastr = toastr;
