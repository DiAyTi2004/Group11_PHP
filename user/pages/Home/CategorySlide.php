<?php
// GET id là lấy id từ bên MENU.php 
$sql_show_category = "SELECT * FROM tbl_category ORDER BY name";
$query_show_category = mysqli_query($connect, $sql_show_category);
?>

<link rel="stylesheet" href="./../styles/CategorySlideStyles.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0" />

<div class="containerCategorySlide">
    <div class="slider-wrapper">
        <button id="prev-slide" class="slide-button material-symbols-rounded">
            chevron_left
        </button>
        <div class="image-list">
            <?php
            while ($row = mysqli_fetch_array($query_show_category)) {
            ?>
                <div class="item">
                    <a href="UserIndex.php?usingPage=category&id=<?php echo $row['id'] ?>">
                        <div class="card-image">
                            <img class="image-item" src="./../../admin/pages/Category/CategoryImages/<?php echo $row['category_image'] ?>" alt="img-1" />
                        </div>
                        <div class="card-content">
                            <h2 class="name"><?php echo $row['name'] ?></h2>
                        </div>
                    </a>
                </div>
            <?php
            }
            ?>
            <button id="next-slide" class="slide-button material-symbols-rounded">
                chevron_right
            </button>
        </div>
        <div class="slider-scrollbar">
            <div class="scrollbar-track">
                <div class="scrollbar-thumb"></div>
            </div>
        </div>
    </div>
</div>
    <script>
        const initSlider = () => {
            const imageList = document.querySelector(".slider-wrapper .image-list");
            const slideButtons = document.querySelectorAll(".slider-wrapper .slide-button");
            const sliderScrollbar = document.querySelector(".container .slider-scrollbar");
            const scrollbarThumb = sliderScrollbar.querySelector(".scrollbar-thumb");
            const maxScrollLeft = imageList.scrollWidth - imageList.clientWidth;

            // Handle scrollbar thumb drag
            scrollbarThumb.addEventListener("mousedown", (e) => {
                const startX = e.clientX;
                const thumbPosition = scrollbarThumb.offsetLeft;
                const maxThumbPosition = sliderScrollbar.getBoundingClientRect().width - scrollbarThumb.offsetWidth;

                // Update thumb position on mouse move
                const handleMouseMove = (e) => {
                    const deltaX = e.clientX - startX;
                    const newThumbPosition = thumbPosition + deltaX;

                    // Ensure the scrollbar thumb stays within bounds
                    const boundedPosition = Math.max(0, Math.min(maxThumbPosition, newThumbPosition));
                    const scrollPosition = (boundedPosition / maxThumbPosition) * maxScrollLeft;

                    scrollbarThumb.style.left = `${boundedPosition}px`;
                    imageList.scrollLeft = scrollPosition;
                }

                // Remove event listeners on mouse up
                const handleMouseUp = () => {
                    document.removeEventListener("mousemove", handleMouseMove);
                    document.removeEventListener("mouseup", handleMouseUp);
                }

                // Add event listeners for drag interaction
                document.addEventListener("mousemove", handleMouseMove);
                document.addEventListener("mouseup", handleMouseUp);
            });

            // Slide images according to the slide button clicks
            slideButtons.forEach(button => {
                button.addEventListener("click", () => {
                    const direction = button.id === "prev-slide" ? -1 : 1;
                    const scrollFraction = 0.18;
                    const scrollAmount = imageList.clientWidth * direction * scrollFraction;
                    imageList.scrollBy({
                        left: scrollAmount,
                        behavior: "smooth"
                    });
                });
            });

            // Show or hide slide buttons based on scroll position
            const handleSlideButtons = () => {
                slideButtons[0].style.display = imageList.scrollLeft <= 0 ? "none" : "flex";
                slideButtons[1].style.display = imageList.scrollLeft >= maxScrollLeft ? "none" : "flex";
            }

            // Update scrollbar thumb position based on image scroll
            const updateScrollThumbPosition = () => {
                const scrollPosition = imageList.scrollLeft;
                const thumbPosition = (scrollPosition / maxScrollLeft) * (sliderScrollbar.clientWidth - scrollbarThumb.offsetWidth);
                scrollbarThumb.style.left = `${thumbPosition}px`;
            }

            // Call these two functions when image list scrolls
            imageList.addEventListener("scroll", () => {
                updateScrollThumbPosition();
                handleSlideButtons();
            });
        }

        window.addEventListener("resize", initSlider);
        window.addEventListener("load", initSlider);
    </script>