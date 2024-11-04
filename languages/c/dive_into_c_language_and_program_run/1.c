#include <stdio.h>

int main(void)
{
    // 将值 0x100000000 放入寄存器 rax 中，在该 64 位值（long）对应的二进制编码中，其第 32 位被置位
    register long num asm("rax") = 0x100000000;
    // 将值 0x1 通过 movl 移动到 rax 寄存器的低 32 位
    asm("movl $0x1, %eax");
    // 将值 0x1 通过 movw 移动到 rax 寄存器的低 16 位
    // asm("movw $0x1, %ax");
    printf("%ld\n", num);
    return 0;
}