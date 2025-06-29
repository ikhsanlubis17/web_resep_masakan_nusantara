// Enhanced favorite toggle function
function toggleFavorite(recipeId, button) {
    // Check if user is authenticated
    if (!document.querySelector('meta[name="csrf-token"]')) {
      alert("Silakan login terlebih dahulu untuk menambahkan favorit")
      return
    }
  
    // Add loading state
    button.style.opacity = "0.6"
    button.style.pointerEvents = "none"
  
    fetch(`/recipes/${recipeId}/favorite`, {
      method: "POST",
      headers: {
        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
        "Content-Type": "application/json",
      },
    })
      .then((response) => {
        if (!response.ok) {
          throw new Error("Network response was not ok")
        }
        return response.json()
      })
      .then((data) => {
        const icon = button.querySelector("i")
        const countElement = document.querySelector(`.favorites-count-${recipeId}`)
  
        if (data.favorited) {
          button.classList.add("favorited")
          icon.className = "bi bi-heart-fill"
        } else {
          button.classList.remove("favorited")
          icon.className = "bi bi-heart"
        }
  
        if (countElement) {
          countElement.textContent = data.favorites_count
        }
  
        // Add success animation
        button.style.transform = "scale(1.2)"
        setTimeout(() => {
          button.style.transform = "scale(1)"
        }, 200)
  
        // Show success message
        showToast(data.favorited ? "Ditambahkan ke favorit" : "Dihapus dari favorit", "success")
      })
      .catch((error) => {
        console.error("Error:", error)
        showToast("Terjadi kesalahan. Silakan coba lagi.", "error")
      })
      .finally(() => {
        button.style.opacity = "1"
        button.style.pointerEvents = "auto"
      })
  }
  
  // Toast notification function
  function showToast(message, type = "info") {
    // Create toast element
    const toast = document.createElement("div")
    toast.className = `toast-notification toast-${type}`
    toast.innerHTML = `
          <div class="toast-content">
              <i class="bi bi-${type === "success" ? "check-circle" : type === "error" ? "exclamation-circle" : "info-circle"}"></i>
              <span>${message}</span>
          </div>
      `
  
    // Add styles
    toast.style.cssText = `
          position: fixed;
          top: 20px;
          right: 20px;
          background: ${type === "success" ? "#28a745" : type === "error" ? "#dc3545" : "#17a2b8"};
          color: white;
          padding: 15px 20px;
          border-radius: 8px;
          box-shadow: 0 4px 12px rgba(0,0,0,0.15);
          z-index: 9999;
          transform: translateX(100%);
          transition: transform 0.3s ease;
      `
  
    document.body.appendChild(toast)
  
    // Animate in
    setTimeout(() => {
      toast.style.transform = "translateX(0)"
    }, 100)
  
    // Remove after 3 seconds
    setTimeout(() => {
      toast.style.transform = "translateX(100%)"
      setTimeout(() => {
        document.body.removeChild(toast)
      }, 300)
    }, 3000)
  }
  
  // Initialize when DOM is loaded
  document.addEventListener("DOMContentLoaded", () => {
    // Add smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
      anchor.addEventListener("click", function (e) {
        e.preventDefault()
        const target = document.querySelector(this.getAttribute("href"))
        if (target) {
          target.scrollIntoView({
            behavior: "smooth",
            block: "start",
          })
        }
      })
    })
  
    // Lazy load images
    const images = document.querySelectorAll("img[data-src]")
    const imageObserver = new IntersectionObserver((entries, observer) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          const img = entry.target
          img.src = img.dataset.src
          img.classList.remove("lazy")
          imageObserver.unobserve(img)
        }
      })
    })
  
    images.forEach((img) => imageObserver.observe(img))
  })
  