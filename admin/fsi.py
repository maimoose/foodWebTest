N=1
while N<10:
    S=1
    while S<10:
        U = 1
        for U in range(1,10):
            div = (N * 100 + S * 10 + U)/7
            mult = N * S * U
            if div == mult:
                print("N-S-U integers are: ", N, S, U)
                # quit()
            U= U+1
        S= S+1
    N= N+1

    
