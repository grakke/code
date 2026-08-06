# AGENTS.md

Project: bare-metal RISC-V kernel (book "Operating System in 1000 Lines").
Runs on QEMU `qemu-system-riscv32` (machine `virt`).

## Build & run
- No Makefile. `./run.sh` builds and boots QEMU in one step.
- Requires LLVM clang (`/usr/local/opt/llvm/bin/clang`, macOS Homebrew; Ubuntu use `CC=clang`) and QEMU with riscv32 support.
- Freestanding cross-compile flags (defined in `run.sh`):
  `-std=c11 --target=riscv32-unknown-elf -fuse-ld=lld -fno-stack-protector -ffreestanding -nostdlib -Wl,-Tkernel.ld -Wl,-Map=kernel.map`
- To verify only, run QEMU: `qemu-system-riscv32 -machine virt -bios default -nographic -serial mon:stdio --no-reboot -kernel kernel.elf`

## Architecture
- Single C source `kernel.c` (boot + `kernel_main` + `memset`). No libc/OS headers — types like `uint32_t`/`size_t` are hand-defined.
- `kernel.ld`: program loaded at `0x80200000` (matches qemu `virt`), entry `boot()` in `.text.boot`. Linker symbols `__bss`, `__bss_end`, `__stack_top` (128KB stack).
- Bare-metal rules: `kernel_main` never returns (`for(;;)`); no syscalls.

## Conventions
- Source comments are in Chinese — keep matching.
- Artifacts `kernel.elf`/`kernel.map` and `disk/` are gitignored; regenerate via `run.sh`.

No lint/typecheck/test tooling. `./run.sh` is the only verification path; edit `kernel.ld` when layout/boot rules change.