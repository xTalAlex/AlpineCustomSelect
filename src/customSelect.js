document.addEventListener("alpine:init", () => {
    Alpine.data("customSelect", ({ placeholder, disabled }) => ({
        open: false,
        value: "",
        label: null,
        placeholder: placeholder,
        disabled: disabled,

        toggleOpen() {
            if (!this.disabled) this.open = !this.open;
            if (this.open)
                this.$nextTick(() => {
                    this.focusSelectedValue();
                });
        },

        close() {
            this.open = false;
            this.$refs.selectButton.focus();
        },

        focusSelectedValue() {
            if (this.$refs.selectDropdown?.firstElementChild) {
                let listItems =
                    this.$refs.selectDropdown.firstElementChild.children;
                let filteredListItems = Array.from(listItems).filter(
                    (li) => li.getAttribute("value") == this.value
                );
                filteredListItems.length
                    ? filteredListItems[0].focus()
                    : this.$refs.selectDropdown.firstElementChild.firstElementChild.focus();
            }
        },

        setValue(value, label) {
            if (this.value != value) {
                this.value = value;
                this.label = label;
            }
            this.close();
        },

        displayedText() {
            let text =
                this.value !== "" && this.value !== null
                    ? this.value
                    : this.placeholder;
            text = this.label !== null ? this.label : text;
            return text;
        },

        getLabelByValue(value) {
            if (this.$refs.selectDropdown?.firstElementChild) {
                let listItems =
                    this.$refs.selectDropdown.firstElementChild.children;
                let filteredListItems = Array.from(listItems).filter(
                    (li) =>
                        li.getAttribute("value") == value &&
                        li.getAttribute("value") !== ""
                );
                if (filteredListItems.length) {
                    this.label = filteredListItems[0].innerHTML;
                }
            }
        },

        container: {
            ["x-effect"]() {
                this.getLabelByValue(this.value);
            },

            ["x-on:click.away"]() {
                if (this.open) this.close();
            },
        },

        button: {
            ["x-on:click.prevent"]() {
                this.toggleOpen();
            },
        },

        dropdown: {
            ["x-show"]() {
                return this.open;
            },

            ["x-on:keydown.escape"]() {
                this.close();
            },

            ["x-transition"]: true,
        },
    }));
});
