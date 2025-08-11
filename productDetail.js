document.addEventListener('DOMContentLoaded', function () {
    // Initialize all functionality
    initializeMagicalImageZoom();
    initializeColorSelection();
    initializeSizeSelection();
});

function initializeMagicalImageZoom() {
    const container = document.getElementById('imageZoomContainer');
    const mainImage = document.getElementById('mainProductImage');
    const zoomLens = document.getElementById('zoomLens');
    const zoomResult = document.getElementById('zoomResult');
    const zoomResultImg = document.getElementById('zoomResultImg');

    if (!container || !mainImage || !zoomLens || !zoomResult || !zoomResultImg) {
        console.warn('Zoom elements not found');
        return;
    }

    // Mouse enter - activate zoom
    container.addEventListener('mouseenter', function () {
        zoomLens.classList.add('active');
        zoomResult.classList.add('active');
    });

    // Mouse leave - deactivate zoom
    container.addEventListener('mouseleave', function () {
        zoomLens.classList.remove('active');
        zoomResult.classList.remove('active');
    });

    // Mouse move - update lens position and zoom view
    container.addEventListener('mousemove', function (e) {
        const rect = container.getBoundingClientRect();
        const x = e.clientX - rect.left;
        const y = e.clientY - rect.top;

        // Calculate lens position (centered on cursor)
        const lensX = x - zoomLens.offsetWidth / 2;
        const lensY = y - zoomLens.offsetHeight / 2;

        // Constrain lens within image bounds
        const maxX = rect.width - zoomLens.offsetWidth;
        const maxY = rect.height - zoomLens.offsetHeight;
        const constrainedX = Math.max(0, Math.min(maxX, lensX));
        const constrainedY = Math.max(0, Math.min(maxY, lensY));

        // Position the lens
        zoomLens.style.left = constrainedX + 'px';
        zoomLens.style.top = constrainedY + 'px';

        // Calculate zoom ratios
        const zoomFactorX = zoomResultImg.offsetWidth / zoomLens.offsetWidth;
        const zoomFactorY = zoomResultImg.offsetHeight / zoomLens.offsetHeight;

        // Calculate the position in the zoomed image
        const bgPosX = -((x - zoomLens.offsetWidth / 2) * zoomFactorX);
        const bgPosY = -((y - zoomLens.offsetHeight / 2) * zoomFactorY);

        // Apply the background position to show the magnified area
        zoomResultImg.style.transform = `translate(${bgPosX}px, ${bgPosY}px) scale(2.5)`;
        zoomResultImg.style.transformOrigin = 'top left';
    });
}

function initializeColorSelection() {
    const colorOptions = document.querySelectorAll('.color-option');
    const selectedColorText = document.getElementById('selectedColor');
    const mainProductImage = document.getElementById('mainProductImage');
    const zoomResultImg = document.getElementById('zoomResultImg');

    colorOptions.forEach(option => {
        option.addEventListener('click', function () {
            // Remove active class from all options
            colorOptions.forEach(opt => opt.classList.remove('active'));

            // Add active class to clicked option
            this.classList.add('active');

            // Get color name and image URL
            const colorName = this.getAttribute('data-color');
            const imageUrl = this.getAttribute('data-image');

            // Update selected color text
            selectedColorText.textContent = colorName;

            // Add loading animation
            mainProductImage.classList.add('loading');

            // Change the main product image with smooth transition
            setTimeout(() => {
                // Update both main image and zoom result image
                mainProductImage.src = imageUrl;
                zoomResultImg.src = imageUrl;
                mainProductImage.alt = `22mm Mulberry Silk Basic Men's Shirt - ${colorName}`;

                // Wait for both images to load before removing loading animation
                let mainImageLoaded = false;
                let zoomImageLoaded = false;

                const checkAllImagesLoaded = () => {
                    if (mainImageLoaded && zoomImageLoaded) {
                        mainProductImage.classList.remove('loading');
                        // Re-initialize zoom functionality to ensure it works with new image
                        reinitializeZoomForNewImage();
                    }
                };

                mainProductImage.onload = () => {
                    mainImageLoaded = true;
                    checkAllImagesLoaded();
                };

                zoomResultImg.onload = () => {
                    zoomImageLoaded = true;
                    checkAllImagesLoaded();
                };

                // Fallback in case images are already cached
                if (mainProductImage.complete) {
                    mainImageLoaded = true;
                    checkAllImagesLoaded();
                }
                if (zoomResultImg.complete) {
                    zoomImageLoaded = true;
                    checkAllImagesLoaded();
                }
            }, 200);
        });
    });
}

function reinitializeZoomForNewImage() {
    const container = document.getElementById('imageZoomContainer');
    const zoomResultImg = document.getElementById('zoomResultImg');

    if (!container || !zoomResultImg) return;

    // Reset any existing transforms on the zoom result image
    zoomResultImg.style.transform = 'translate(0px, 0px) scale(2.5)';
    zoomResultImg.style.transformOrigin = 'top left';

    // Force a reflow to ensure the image is properly loaded and positioned
    container.offsetHeight;

    // Ensure zoom functionality is preserved by refreshing the image dimensions
    setTimeout(() => {
        // This ensures the zoom calculations work correctly with the new image
        if (zoomResultImg.naturalWidth && zoomResultImg.naturalHeight) {
            // Image is fully loaded and ready for zoom
            console.log('Zoom functionality ready for new image');
        }
    }, 100);
}

function initializeSizeSelection() {
    const sizeOptions = document.querySelectorAll('.size-option:not(.out-of-stock)');
    const selectedSizeText = document.getElementById('selectedSize');

    sizeOptions.forEach(option => {
        option.addEventListener('click', function () {
            // Remove active class from all size options
            document.querySelectorAll('.size-option').forEach(opt => opt.classList.remove('active'));

            // Add active class to clicked option
            this.classList.add('active');

            // Get size name
            const sizeName = this.getAttribute('data-size');

            // Update selected size text
            selectedSizeText.textContent = sizeName;
        });
    });
}