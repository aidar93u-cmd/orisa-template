// preloader.js
(function ($) {
	"use strict";

	// ============================================
	// GSAP CONFIGURATION
	// ============================================
	gsap.config({
		nullTargetWarn: false,
		trialWarn: false,
	});

	if (typeof ScrollTrigger !== "undefined") {
		gsap.registerPlugin(ScrollTrigger);
	}

	// ============================================
	// GLOBAL VARIABLES
	// ============================================
	const html = document.documentElement;
	const body = document.body;

	// ============================================
	// 1. PRELOADER MODULE
	// ============================================
	window.TJPreloader = {
		init: function () {
			html.classList.add("loading");
			html.classList.add("first-load");
			body.classList.add("preloader-active");

			const preloader = document.querySelector(".tj-preloader");
			const marquee = document.querySelector(".loading_marquee");
			const original = marquee.querySelector(".marquee_text");

			// Duplicate marquee text
			const duplicateCount = 200;
			for (let i = 1; i < duplicateCount; i++) {
				const clone = original.cloneNode(true);
				marquee.appendChild(clone);
			}
			const texts = marquee.querySelectorAll(".marquee_text");

			let percent = 0;
			let isLoaded = false;

			// Save reference to this for use in callbacks
			const self = this;

			// Complete function
			const completePreloader = () => {
				self.hasCompleted = true;
				self.exit(preloader);
			};

			// Progress animation (smooth 0-100%)
			const progressTimer = setInterval(() => {
				if (document.readyState === "complete") {
					isLoaded = true;
				}
				if (percent < 100) {
					// Speed up when loaded
					const increment = isLoaded ? 3 : 0.5;
					percent += increment;
					percent = Math.min(percent, 100);

					texts.forEach(text => {
						text.textContent = Math.floor(percent) + "%";
					});
				}

				// Only exit when ALL conditions met
				if (percent >= 100 && isLoaded) {
					clearInterval(progressTimer);
					completePreloader();
				}
			}, 20);
		},

		exit: function (preloader) {
			const preloaderSvg = preloader.querySelector("#preloaderSvg");
			const marquee = preloader.querySelector(".loading_marquee");
			const preloaderText = preloader.querySelector(".tj-preloader_bottom");
			const curve = "M0 502S175 329.5 500 329.5s500 172.5 500 172.5V0H0Z";
			const flat = "M0 2S175 1 500 1s500 1 500 1V0H0Z";

			const preTl = gsap.timeline();
			preTl.to([marquee, preloaderText], {
				delay: 0.5,
				opacity: 0,
				duration: 0.4,
			});
			preTl
				.to(preloaderSvg, {
					duration: 0.5,
					attr: { d: curve },
					ease: "power2.in",
				})
				.to(preloaderSvg, {
					duration: 0.5,
					attr: { d: flat },
				});
			preTl.to(preloader, {
				yPercent: -100,
				duration: 0.6,
				ease: "power2.inOut",
				onStart: () => {
					preloader.remove();
					body.classList.remove("preloader-active");
				},
			});
		},
	};
})(jQuery);
