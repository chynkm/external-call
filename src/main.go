package main

import (
  "fmt"
  "crypto/md5"
  "time"
  "strconv"
  "encoding/hex"
)

func main() {
  time.Sleep(4100 * time.Millisecond)
  currentTime := strconv.FormatInt(time.Now().Unix(), 10)
  fmt.Printf("%s", GetMD5Hash(currentTime))
}

func GetMD5Hash(text string) string {
  hasher := md5.New()
  hasher.Write([]byte(text))
  return hex.EncodeToString(hasher.Sum(nil))
}